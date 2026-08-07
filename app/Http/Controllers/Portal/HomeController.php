<?php

namespace App\Http\Controllers\Portal;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\BusinessSaleFlow;
use App\Models\BusinessPurchaseFlow;
use App\Models\BusinessEvaluation;
use App\Models\Visa;
use App\Models\BlogCategories;
use App\Models\Content;
use App\Models\Franchise;
use App\Models\Team;
use App\Models\Resource;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){  
        $value6 = Content::where('id', 6)->first();
        $value7 = Content::where('id', 7)->first();
        $value8 = Content::where('id', 8)->first();
        $value9 = Content::where('id', 9)->first();
        $value10 = Content::where('id', 10)->first();
        $value11 = Content::where('id', 11)->first();
        $value12 = Content::where('id', 12)->first();
        $value13 = Content::where('id', 13)->first();
        $value14 = Content::where('id', 14)->first();
        $value15 = Content::where('id', 15)->first();
        $value16 = Content::where('id', 16)->first();
        $value17 = Content::where('id', 17)->first();
        $value18 = Content::where('id', 18)->first();
        $value19 = Content::where('id', 19)->first();
        $value20 = Content::where('id', 20)->first();
        $value21 = Content::where('id', 21)->first();
    
        // Pass all the values to the view
        return view('front.home', compact(
            'value6', 'value7', 'value8', 'value9', 'value10', 
            'value11', 'value12', 'value13', 'value14', 'value15', 
            'value16', 'value17', 'value18', 'value19', 'value20', 'value21'
        )); }

    public function sell_business(){
        $flow_steps = BusinessSaleFlow::orderBy('id', 'ASC')->get();
      
        return view('front.sell-business',compact('flow_steps'));
    }
    public function buy_business(){
        $flow_steps=BusinessPurchaseFlow::orderBy('id', 'ASC')->get();
        return view('front.buy-business',compact('flow_steps'));
    }
    public function contactus(){
        $value1=Content::where('id',1)->first();
        $value2=Content::where('id',2)->first();
        $value3=Content::where('id',3)->first();
        $value4=Content::where('id',4)->first();
        $value5=Content::where('id',5)->first();
       
        return view('front.contact-us',compact('value1','value2','value3','value4','value5'));
    }

    public function business_evaluation(){
        $flow=BusinessEvaluation::all();
        return view('front.business-evaluation',compact('flow'));
    }

    public function franchise_services(){
        $flow=Franchise::all();
        return view('front.franchise',compact('flow'));
    }

    public function visa_services(){
        $flow_steps=Visa::all();
        return view('front.visa-services',compact('flow_steps'));
    }

    public function blogs(){
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(3); 
        $categories=BlogCategories::all();

        $recentBlogs = Blog::orderBy('created_at', 'desc')
                        ->limit(5)
                        ->get();


        return view('front.blog',compact('blogs','categories','recentBlogs'));
    }

    public function blog_single($id){
        $blog = Blog::findOrFail($id);
        $prevBlog = Blog::where('id', '<', $id)->orderBy('id', 'desc')->first();
        $nextBlog = Blog::where('id', '>', $id)->orderBy('id', 'asc')->first();
        $categories = BlogCategories::all();



        $recentBlogs = Blog::where('id', '!=', $id)
                        ->orderBy('created_at', 'desc')
                        ->limit(5)
                        ->get();
        
        return view('front.blog-single', compact('blog', 'categories', 'prevBlog', 'nextBlog','recentBlogs'));
    }

   public function blogs_by_category($id){
    $blogs=Blog::where('category_id',$id)->paginate(3); 
        $categories=BlogCategories::where('id','!=',$id)->get();
        $recentBlogs = Blog::orderBy('created_at', 'desc')
                        ->limit(5)
                        ->get();

                       
        return view('front.blog',compact('blogs','categories','recentBlogs'));
   }


    public function team(){
        $flow=Team::orderBy('position')->get();
        return view('front.team',compact('flow'));
    }

    public function business_search(){
        return view('front.business-search'); 
    }


    public function about(){
        $flow=About::all();
        return view('front.aboutus',compact('flow'));
    }

    public function resources(){
        $flow=Resource::all(); 
        return view('front.resource',compact('flow'));
    }


    public function soon(){
        return view('front.comming-soon');
    }
   
}
