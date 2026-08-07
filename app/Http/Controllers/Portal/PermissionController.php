<?php

namespace App\Http\Controllers\portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        return view('portal.permissions.index');
    }

    public function add(){
        return view('portal.permissions.add');
    }
    public function edit($id){
        
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
        $totalRecords = Permission::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Permission::select('count(*) as allcount')->where('name', 'like', '%' . $searchValue . '%')->count();
        $records = Permission::orderBy($columnName, $columnSortOrder)
            ->where('name', 'like', '%' . $searchValue . '%')
            ->orWhere('id', 'like', '%' . $searchValue . '%')
            ->select('*')
            ->skip($start)
            ->take($rowperpage)
            ->orderBy($columnName, $columnSortOrder)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {
           // $route = route('portal.permissions.edit', $record->id);
            $delete_route = route('portal.permissions.delete', $record->id); 
            $data_arr[] = array(
                "id" => $record->id,
                "name" => $record->name,
                "action" =>
                    '' 
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
            'permission' => 'required',
            
        ]);
        $permission = Permission::create([
            'name' => $request->permission,
            'guard_name' => 'web',
        ]);
    if ($permission) {
       
        return response()->json(['message' => 'Permission added successfully', 'redirectURL' => route('portal.permissions.index')], SUCCESS_CODE);
    } else {
        return response()->json(['message' => 'Failed to add Permission'], FAILURE_CODE);
    }
    }
}
