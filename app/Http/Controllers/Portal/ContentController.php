<?php

namespace App\Http\Controllers\portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    public function index($page_name){
        if($page_name=='Home'){
            $contents=Content::where('page_name','Home')->get();
            return view('portal.content.home',compact('page_name','contents'));
        }
        else{
            return view('portal.content.index',compact('page_name'));
        }
        
    }

    public function add($page_name){
        return view('portal.content.add',compact('page_name'));
    }


    public function store(request $request,$page_name){
        $request->validate([
            'value'=>'required',
            'title'=>'required'
        ]);
        $content=Content::create([
            'value'=>$request->value,
            'title'=>$request->title,
            'page_name'=>$page_name
        ]);
        if ($content) {
            return response()->json(['message' => 'Added', 'redirectURL' => route('portal.content.index',$page_name)], 200);
        } else {
            return response()->json(['message' => 'Failed to add'], 500);
        }
    }

    public function edit($id,$page_name){
        $flow=Content::findorfail($id);
        return view('portal.content.edit',compact('flow','page_name'));
    }
    public function update(Request $request,$id,$page_name){
        $request->validate([
            'value'=>'required',
            'title'=>'required'
        ]);
        $value=Content::findorfail($id);
        $value->value=$request->value;
        $value->title=$request->title;
        $value->save();
        return response()->json(['message' => 'Updated', 'redirectURL' => route('portal.content.index',$page_name)], 200);
    }

    public function list(Request $request, $page_name)
{
    ## Read values from request
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

    // Total records without filtering
    $totalRecords = Content::where('page_name', $page_name)->count();

    // Total records with filtering
    $totalRecordswithFilter = Content::where('page_name', $page_name)
        ->where(function ($query) use ($searchValue) {
            $query->where('value', 'like', '%' . $searchValue . '%')
                  ->orWhere('title', 'like', '%' . $searchValue . '%');
        })
        ->count();

    // Get filtered records with sorting and pagination
    $records = Content::where('page_name', $page_name)
        ->where(function ($query) use ($searchValue) {
            $query->where('value', 'like', '%' . $searchValue . '%')
                  ->orWhere('title', 'like', '%' . $searchValue . '%');
        })
        ->orderBy($columnName, $columnSortOrder)
        ->skip($start)
        ->take($rowperpage)
        ->get();

    // Prepare data for DataTables
    $data_arr = [];
    foreach ($records as $record) {
        $edit_route = route('portal.content.edit', ['id' => $record->id, 'page_name' => $page_name]); 
        $data_arr[] = [
            "id" => $record->id,
            "value" => $record->value,
            "title" => $record->title,
            "action" =>
                '<div class="btn-group">
                    <a href="' . $edit_route . '" class="mr-1 text-info" title="Edit">
                        <i class="fa fa-edit"></i>
                    </a>
                </div>'
        ];
    }

    // Construct the JSON response for DataTables
    $response = [
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordswithFilter,
        "aaData" => $data_arr
    ];

    return \Response::json($response);
}

public function updateHome(Request $request){
    foreach ($request->input('contents', []) as $contentId => $contentData) {
        // Find the content by ID and update its value
        $content = Content::find($contentId);
        if ($content) {
            $content->value = $contentData['value'];
            $content->save();
        }
    }
    return response()->json(['message' => 'Updated', 'redirectURL' => route('portal.content.index','Home')], 200);
}

}
