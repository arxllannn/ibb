<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategories;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function index(){
        return view('portal.blogs.index');
    }

    public function add(){
        $categories = BlogCategories::all();
        return view('portal.blogs.add',compact('categories'));
    }

    public function edit($id)
    {
        // Retrieve the blog and its related category data
        $blog = Blog::findOrFail($id);
        $categories = BlogCategories::all(); // Assuming you have a Category model
    
        // Pass the blog and categories to the view
        return view('portal.blogs.edit', compact('blog', 'categories'));
    }

    public function list(Request $request)
    {
        // Read values
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
        $totalRecords = Blog::count();
        $totalRecordswithFilter = Blog::where('title', 'like', '%' . $searchValue . '%')->count();

        // Fetch records with pagination and sorting
        $records = Blog::with('category')->orderBy($columnName, $columnSortOrder)
            ->where('title', 'like', '%' . $searchValue . '%')
            ->select('*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        
        foreach ($records as $record) {
            $delete_route = route('portal.blog.delete', $record->id); 
            $edit_route = route('portal.blog.edit', $record->id); 
            $data_arr[] = array(
                "id" => $record->id,
                "title" => $record->title,
                "content"=>$record->content,
                "banner"=>$record->banner,
                "created_at"=>Carbon::parse($record->created_at)->format('Y-m-d H:i:s'),
                "category" => $record->category ? $record->category->name : 'N/A', // Display category name
                "created_by" => $record->created_by,  // Example for created by
                "action" =>
                    '<div class="btn-group">
                        <a href="' . $edit_route . '" class="mr-1 text-info" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                      <a href="#" onclick="delete_confirmation(\'' . $delete_route . '\')" class="mr-1 text-danger" title="Delete">
                            <i class="fa fa-trash"></i>
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

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'content' => 'required|string',
            'category_id' => 'required|integer|exists:blog_categories,id',

        ]);

        $slugSource = $request->filled('slug') ? $request->slug : $request->title;
        $slug = Blog::generateUniqueSlug($slugSource);

        // Handle the image upload
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannerName = time() . '_' . $banner->getClientOriginalName(); // Unique name
            $bannerPath = $banner->storeAs('/banners/'.date('Y-m-d'), $bannerName, 'public'); // Store in the public disk
            $bannerUrl = asset('storage/' . $bannerPath); // Get the absolute URL
        } else {
            $bannerUrl = null;
        }
    
        // Create a new blog post
        $blog = Blog::create([
            'title' => $request->title,
            'slug' => $slug,
            'banner' => $bannerUrl, // Save the absolute path in the banner field
            'content' => $request->content,
            'category_id' => $request->category_id,
            'created_by' => auth()->user()->id,
            
            'is_archived' => $request->input('is_archived', 0), // Optional field
        ]);
    
        if ($blog) {
            return response()->json(['message' => 'Blog added successfully', 'redirectURL' => route('portal.blog.index')], 200);
        } else {
            return response()->json(['message' => 'Failed to add blog'], 500);
        }
    }
    

    public function delete($id)
    {
        // Find the blog post or fail
        $blog = Blog::findOrFail($id);
        $blog->delete(); // Soft delete

        return redirect()->route('portal.blog.index')->with('success', 'Blog deleted');
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'banner' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Image is optional, but still validate if present
            'content' => 'required|string',
            'category_id' => 'required|integer|exists:blog_categories,id',
        ]);

        // Find the blog post by ID
        $blog = Blog::findOrFail($id);

        // Handle the image upload if a new banner is uploaded
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannerName = time() . '_' . $banner->getClientOriginalName(); // Unique name
            $bannerPath = $banner->storeAs('banners/'.date('Y-m-d'), $bannerName, 'public'); // Store in the public disk
            $bannerUrl = asset('storage/' . $bannerPath); // Get the absolute URL
        } else {
            $bannerUrl = $blog->banner; // Keep the existing banner if no new image is uploaded
        }

        $slugSource = $request->filled('slug') ? $request->slug : $blog->title;
        $slug = Blog::generateUniqueSlug($slugSource, $blog->id);

        // Update the blog post fields
        $blog->title = $request->title;
        $blog->slug = $slug;
        $blog->banner = $bannerUrl;
        $blog->content = $request->content;
        $blog->category_id = $request->category_id;
        $blog->save();
    
        if ($blog) {
            return response()->json(['message' => 'Blog updated successfully', 'redirectURL' => route('portal.blog.index')], 200);
        } else {
            return response()->json(['message' => 'Failed to update blog'], 500);
        }
    }
}
