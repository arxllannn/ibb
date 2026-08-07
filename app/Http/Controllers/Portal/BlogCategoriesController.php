<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategories;

class BlogCategoriesController extends Controller
{
    public function index(){
        
        return view('portal.blog-categories.index');
     }
 
     public function add(){
       
         return view('portal.blog-categories.add');
     }
     public function edit($id){
         $flow=BlogCategories::findorfail($id);
         return view('portal.blog-categories.edit',compact('flow'));
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
         $totalRecords = BlogCategories::select('count(*) as allcount')->count();
         $totalRecordswithFilter = BlogCategories::select('count(*) as allcount')->where('name', 'like', '%' . $searchValue . '%')->count();
         $records = BlogCategories::orderBy($columnName, $columnSortOrder)
             ->where('name', 'like', '%' . $searchValue . '%')
             ->select('*')
             ->skip($start)
             ->take($rowperpage)
             ->orderBy($columnName, $columnSortOrder)
             ->get();
 
         $data_arr = array();
         
         foreach ($records as $record) {
            
             $delete_route = route('portal.blog-categories.delete', $record->id); 
             $edit_route = route('portal.blog-categories.edit', $record->id); 
             $data_arr[] = array(
                 "id" => $record->id,
                 "name" => $record->name,
                 "action" =>
                     '<div class="btn-group">

                     <a  href="' . $edit_route . '" class="mr-1 text-info" title="Edit">
                         <i class="fa fa-edit"></i>
                     </a>
                     <a href="#" onclick="delete_confirmation(\'' . $delete_route . '\')" class="mr-1 text-danger" title="Delete">
                         <i class="fa fa-trash"></i>
                     </a>
                 </div>
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
     public function store(Request $request)
 {
     // Validate the incoming request data
     $request->validate([
         'name' => 'required|string|max:255',
        
         
     ]);

     $flow = BlogCategories::create([
         'name' => $request->name,
     ]);
 
     // Check if the creation was successful
     if ($flow) {
         return response()->json(['message' => 'category added successfully', 'redirectURL' => route('portal.blog-categories.index')], 200);
     } else {
         return response()->json(['message' => 'Failed to add category'], 500);
     }
 }
 public function delete($id){
     $flow=BlogCategories::findorfail($id);
     $flow->delete();
     return redirect()->route('portal.blog-categories.index')->with('success','category Deleted');
 }
 
 public function update(Request $request, $id = null)
 {
     // Validate the incoming request data
     $request->validate([
         'name' => 'required|string|max:255',
         
        
     ]);
     // Find the BusinessSaleFlow instance or create a new one
     $flow = BlogCategories::findOrFail($id) ;
     $flow->name = $request->name;
     $flow->save();
 
     // Check if the save was successful
     if ($flow) {
         return response()->json(['message' => 'category updated successfully', 'redirectURL' => route('portal.blog-categories.index')], 200);
     } else {
         return response()->json(['message' => 'Failed to update category'], 500);
     }
 }
}
