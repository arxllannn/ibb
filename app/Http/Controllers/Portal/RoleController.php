<?php

namespace App\Http\Controllers\portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(){
        return view('portal.roles.index');
    }

    public function add(){
        return view('portal.roles.add');
    }
    public function edit($id){
        $role=Role::findorfail($id);
        return view('portal.roles.edit',compact('role'));
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
        $totalRecords = Role::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Role::select('count(*) as allcount')->where('name', 'like', '%' . $searchValue . '%')->count();
        $records = Role::orderBy($columnName, $columnSortOrder)
            ->where('name', 'like', '%' . $searchValue . '%')
            ->select('*')
            ->skip($start)
            ->take($rowperpage)
            ->orderBy($columnName, $columnSortOrder)
            ->get();

        $data_arr = array();
        $actionHtml="";
        foreach ($records as $record) {
            $route = route('portal.roles.edit', $record->id);
            $delete_route = route('portal.roles.delete', $record->id); 
            
           
            $actionHtml = '<div class="btn-group">
                        <a href="' . $route . '" class="mr-1 text-info" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>';
            
           
                $actionHtml .=  '<a href="#" onclick="delete_confirmation(\'' . $delete_route . '\')" class="mr-1 text-danger" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </a>';
                 
            if (auth()->user()->can('toggle-permissions')) {
                            $actionHtml .= '<a href="#" class="mr-1 text-secondary" title="Manage Permissions" onclick="openPermissionsModal(' . $record->id . ')">
                                                <i class="fa fa-cog"></i>
                                            </a>';
            }
            $data_arr[] = array(
                "id" => $record->id,
                "name" => $record->name,
                "action" =>$actionHtml
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
            'role' => 'required',  
        ]);
        $role = Role::create(['name' => $request->role]);
    if ($role) {
       
        return response()->json(['message' => 'Role added successfully', 'redirectURL' => route('portal.roles')], SUCCESS_CODE);
    } else {
        return response()->json(['message' => 'Failed to add role'], FAILURE_CODE);
    }
    }

    public function update(Request $request, $id){
        $request->validate([
            'role' => 'required|unique:roles,name',  
        ]);
    
        try {
            $role = Role::findOrFail($id);
            $role->name = $request->role;
            if ($role->save()) {
                return response()->json(['message' => 'Role updated successfully', 'redirectURL' => route('portal.roles')], SUCCESS_CODE);
            } else {
                return response()->json(['message' => 'Failed to update role'], FAILURE_CODE);
            }
        } catch (\Exception $e) {
            
            return response()->json(['message' => 'An error occurred while updating the role'], NORESPONSE_CODE);
        }
    }

    public function permissions(Role $role,$id)
    {
    
    $role=Role::findorfail($id);
    $rolePermissions = $role->permissions()->pluck('id')->toArray();
    $allPermissions = Permission::all();

    // You can return a view with permissions data
    $html = '<input type="hidden" name="role_id_text_box" id="role_id_text_box" value="'.$role->id.'">';
    foreach ($allPermissions as $permission) {
        
        if($role->hasPermissionTo($permission)){
            $isChecked="checked";
        }
        else{
            $isChecked="";
        }
        //$isChecked = in_array($permission->id, $rolePermissions) ? 'checked' : '';
        $html .= ' <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="permission_' . $permission->id . '" data-permission-id="' . $permission->id . '" ' . $isChecked . '>
        <label class="form-check-label" for="permission_' . $permission->id . '">
            ' . $permission->name . '
        </label>
      </div>';
    }

    // Return the HTML content representing permissions
    return $html;
    }

    public function togglePermission(Request $request, $role)
    {
    $role=Role::findorfail($role);
    $permissionId = $request->permission_id;
    $permission = Permission::findOrFail($permissionId);
    $isChecked = $request->input('is_checked');
    $hasPermission = $role->hasPermissionTo($permission);
    if (!$hasPermission) {
        $role->givePermissionTo($permission); // Grant permission
    } elseif ($hasPermission) {
        $role->revokePermissionTo($permission); // Revoke permission
    }
    return response()->json(['message' => 'Permission toggled successfully']);
    }

    public function delete($id){
        $role=Role::findorfail($id);
        if($role){
            $role->delete();
            return redirect()->route('portal.roles')->with('success','Role Deleted');
        }
        else{
            return redirect()->route('portal.roles')->with('error','Something went wrong');
        }
    }
}
