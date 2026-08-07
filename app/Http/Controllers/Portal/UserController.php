<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
//Models
use App\Models\User;
use App\Models\Session;


class UserController extends Controller
{
    public function index(){
       //return auth()->user();
     return view('portal.users.index');
    }

    public function add(){
        $roles=Role::all();
        return view('portal.users.add',compact('roles'));
    }
    public function edit($id){
        $users=User::findorfail($id);
        $roles=Role::all();
        return view('portal.users.edit',compact('users','roles'));
    }

    public function list(Request $request)
    {
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = User::select('count(*) as allcount')->count();
        $totalRecordswithFilter = User::select('count(*) as allcount')->where('name', 'like', '%' . $searchValue . '%')->orWhere('email', 'like', '%' . $searchValue . '%')->count();
        $records = User::orderBy($columnName, $columnSortOrder)
            ->where('name', 'like', '%' . $searchValue . '%')
            ->orWhere('email', 'like', '%' . $searchValue . '%')
            ->select('*')
            ->skip($start)
            ->take($rowperpage)
            ->orderBy($columnName, $columnSortOrder)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {
            $route = route('portal.users.edit', $record->id);
            $delete_route = route('portal.users.delete', $record->id);
           
            $userRoles = $record->getRoleNames()->implode(', ');
            //dd($userRoles );
            $data_arr[] = array(
                "id" => $record->id,
                "name" => $record->name,
                "email" => $record->email,
                'role'=>$userRoles,
                "action" =>
                    '<div class="btn-group">
                   
                    <a  href="' . $route . '" class="mr-1 text-info" title="Edit">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="#" onclick="delete_confirmation(\'' . $delete_route . '\')" class="mr-1 text-danger" title="Delete">
                        <i class="fa fa-trash"></i>
                    </a>
                   <a href="#" onclick="showChangePasswordModal(' . $record->id . ')" class="mr-1 text-warning" title="Change Password">
                        <i class="fa fa-cog"></i>
                    </a>
                </div>' 
                
            

            );
        }
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );
        return \Response::json($response);
    }
    public function store(Request $request){
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password'=>'required',
            'role_id' => 'required|exists:roles,id',
        ]);
        $user = User::createUser($request->name,$request->email,$request->password);
    if ($user) {
        $roleId = $request->role_id;
        $role = Role::findById($roleId);
        $user->assignRole($role);
        return response()->json(['message' => 'User Added', 'redirectURL' => route('portal.users.index')], SUCCESS_CODE);
    } else {
        return response()->json(['message' => 'Failed to add User'], FAILURE_CODE);
    }
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'role' => 'required|exists:roles,id',
        ]);
        $user = User::findOrFail($id);
        $user->name=$request->name;
        $role = Role::findOrFail($request->role);
        $user->syncRoles([$role]);
        if($user->save()){
            return response()->json(['message' => 'User Updated', 'redirectURL' => route('portal.users.index')], SUCCESS_CODE);
        }

    }

    public function delete($id){
        $deleted=User::deleteUser($id);
        if($deleted){
            return redirect()->route('portal.users.index')->with('success','User Deleted');
        }
        else{
            return redirect()->route('portal.users.index')->with('error','Something Went Wrong');
        }
    }

    public function force_logout($id){
        $session=Session::where('user_id',$id)->first();
        if ($session) {
            $session->delete();
            return redirect()->route('portal.users.index')->with('success','Ended User Session');
        } else {
            return redirect()->route('portal.users.index')->with('error','Something went wrong');
        }
    }

    public function changePassword(Request $request)
    {
        // Validate the request
        $request->validate([
            
            'userId' => 'required|integer',
            'newPassword' => 'required|string|min:2|confirmed',
        ]);

        // Find the user by ID
        $user = User::findOrFail($request->userId);
        

        // Update the user's password
        $user->password = \Hash::make($request->newPassword);
        $user->save();

        return response()->json(['message' => 'Password changed successfully!']);
    }
    
}
