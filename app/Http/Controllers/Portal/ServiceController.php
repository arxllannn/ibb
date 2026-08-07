<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        //return auth()->user();
      return view('portal.services.index');
     }
 
     public function add(){
    
         return view('portal.services.add');
     }
     public function edit($id){
         $services=Service::findorfail($id);
         return view('portal.services.edit');
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
         $totalRecords = Service::select('count(*) as allcount')->count();
         $totalRecordswithFilter = Service::select('count(*) as allcount')->where('name', 'like', '%' . $searchValue . '%')->count();
         $records = Service::orderBy($columnName, $columnSortOrder)
             ->where('name', 'like', '%' . $searchValue . '%')
             ->select('*')
             ->skip($start)
             ->take($rowperpage)
             ->orderBy($columnName, $columnSortOrder)
             ->get();
 
         $data_arr = array();
 
         foreach ($records as $record) {
             $route = route('portal.users.edit', $record->id);
             $delete_route = route('portal.users.delete', $record->id);
             $hasActiveSession = $record->sessions()->where('last_activity', '>', now()->subMinutes(config('session.lifetime')))->exists();
             $logoutButton = $hasActiveSession ? '<a href="' . route('portal.users.force.logout',$record->id) . '" class=" mr-1 text-green" title="Logout"><i class="mdi mdi-power"></i></a>' : '';
             $userRoles = $record->getRoleNames()->implode(', ');
             //dd($userRoles );
             $data_arr[] = array(
                 "id" => $record->id,
                 "name" => $record->name,
                 'role'=>$userRoles,
                 "action" =>
                     '<div class="btn-group">
                    
                     <a  href="' . $route . '" class="mr-1 text-info" title="Edit">
                         <i class="fa fa-edit"></i>
                     </a>
                     <a href="#" onclick="delete_confirmation(\'' . $delete_route . '\')" class="mr-1 text-danger" title="Delete">
                         <i class="fa fa-trash"></i>
                     </a>
                     '.$logoutButton .'
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
         $user = Service::createUser($request->name,$request->email,$request->password);
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
         $service = Service::findOrFail($id);
         $service->name=$request->name;
         if($service->save()){
             return response()->json(['message' => 'service Updated', 'redirectURL' => route('portal.users.index')], SUCCESS_CODE);
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
 
   
}
