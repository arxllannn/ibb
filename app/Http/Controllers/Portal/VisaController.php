<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visa;

class VisaController extends Controller
{
    
    public function index(){
        return view('portal.visa-services.index');
     }
 
     public function add(){
       
         return view('portal.visa-services.add');
     }
     public function edit($id){
         $flow=Visa::findorfail($id);
         return view('portal.visa-services.edit',compact('flow'));
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
         $totalRecords = Visa::select('count(*) as allcount')->count();
         $totalRecordswithFilter = Visa::select('count(*) as allcount')->where('content', 'like', '%' . $searchValue . '%')->orwhere('heading', 'like', '%' . $searchValue . '%')->count();
         $records = Visa::orderBy($columnName, $columnSortOrder)
             ->where('heading', 'like', '%' . $searchValue . '%')
             ->orWhere('content', 'like', '%' . $searchValue . '%')
             ->select('*')
             ->skip($start)
             ->take($rowperpage)
             ->orderBy($columnName, $columnSortOrder)
             ->get();
 
         $data_arr = array();
 
         foreach ($records as $record) {
            
             $delete_route = route('portal.visa.delete', $record->id); 
             $edit_route = route('portal.visa.edit', $record->id); 
             $data_arr[] = array(
                 "id" => $record->id,
                 "heading" => $record->heading,
                 "content" => $record->content,
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
         'heading' => 'required|string|max:255',
         'content' => 'required|string',
         
     ]);

     $flow = Visa::create([
         'heading' => $request->heading,
         'content' => $request->content,
        
     ]);
 
     // Check if the creation was successful
     if ($flow) {
         return response()->json(['message' => 'Step added successfully', 'redirectURL' => route('portal.visa.index')], 200);
     } else {
         return response()->json(['message' => 'Failed to add Step'], 500);
     }
 }
 public function delete($id){
     $flow=Visa::findorfail($id);
     $flow->delete();
     return redirect()->route('portal.visa.index')->with('success','Step Deleted');
 }
 
 public function update(Request $request, $id = null)
 {
     // Validate the incoming request data
     $request->validate([
         'heading' => 'required|string|max:255',
         'content' => 'required|string',
        
     ]);
 
     // Find the BusinessSaleFlow instance or create a new one
     $flow = Visa::findOrFail($id) ;

     $flow->heading = $request->heading;
     $flow->content = $request->content;
   
     $flow->save();
 
     // Check if the save was successful
     if ($flow) {
         return response()->json(['message' => 'Step updated successfully', 'redirectURL' => route('portal.visa.index')], 200);
     } else {
         return response()->json(['message' => 'Failed to update Step'], 500);
     }
 }
}
