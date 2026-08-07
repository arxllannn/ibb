<?php

namespace App\Http\Controllers;

use App\Models\Intro;
use Illuminate\Http\Request;

class IntroController extends Controller
{
    public function index(){
        return view('portal.intro.index');
     }
 
     public function add(){
       
         return view('portal.intro.add');
     }
     public function edit($id){
         $flow=Intro::findorfail($id);
         return view('portal.intro.edit',compact('flow'));
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
         $totalRecords = Intro::select('count(*) as allcount')->count();
         $totalRecordswithFilter = Intro::select('count(*) as allcount')->where('intro', 'like', '%' . $searchValue . '%')->orwhere('service_name', 'like', '%' . $searchValue . '%')->count();
         $records = Intro::orderBy($columnName, $columnSortOrder)
             ->where('service_name', 'like', '%' . $searchValue . '%')
             ->orWhere('intro', 'like', '%' . $searchValue . '%')
             ->select('*')
             ->skip($start)
             ->take($rowperpage)
             ->orderBy($columnName, $columnSortOrder)
             ->get();
 
         $data_arr = array();
 
         foreach ($records as $record) {
            
             $delete_route = route('portal.intro.delete', $record->id); 
             $edit_route = route('portal.intro.edit', $record->id); 
             $data_arr[] = array(
                 "id" => $record->id,
                 "service_name" => $record->service_name,
                 "intro" => $record->intro,
                 "action" =>
                     '<div class="btn-group">
                    
                     <a  href="' . $edit_route . '" class="mr-1 text-info" title="Edit">
                         <i class="fa fa-edit"></i>
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

        //  <a href="#" onclick="delete_confirmation(\'' . $delete_route . '\')" class="mr-1 text-danger" title="Delete">
        //                  <i class="fa fa-trash"></i>
        //              </a>
     }
     public function store(Request $request)
 {
     // Validate the incoming request data
     $request->validate([
         'heading' => 'required|string|max:255',
         'content' => 'required|string',
         
     ]);

     $flow = Intro::create([
         'heading' => $request->heading,
         'content' => $request->content,
        
     ]);
 
     // Check if the creation was successful
     if ($flow) {
         return response()->json(['message' => 'Intro added successfully', 'redirectURL' => route('portal.about.index')], 200);
     } else {
         return response()->json(['message' => 'Failed to add Intro'], 500);
     }
 }
 public function delete($id){
     $flow=Intro::findorfail($id);
     $flow->delete();
     return redirect()->route('portal.about.index')->with('success','Intro Deleted');
 }
 
 public function update(Request $request, $id)
 {
     // Validate the incoming request data
     $request->validate([
         
         'content' => 'required|string',
        
     ]);
 
     // Find the BusinessSaleFlow instance or create a new one
     $flow = Intro::findOrFail($id) ;

    
     $flow->intro = $request->content;
   
     $flow->save();
 
     // Check if the save was successful
     if ($flow) {
         return response()->json(['message' => 'Intro updated successfully', 'redirectURL' => route('portal.intro.index')], 200);
     } else {
         return response()->json(['message' => 'Failed to update Intro'], 500);
     }
 }
}
