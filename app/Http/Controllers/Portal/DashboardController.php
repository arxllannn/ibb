<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Franchise;
use App\Models\Visa;
Use App\Models\BusinessEvaluation;
use App\Models\BusinessPurchaseFlow;
use App\Models\BusinessSaleFlow;
use App\Models\Message;
use App\Models\Subscriber;
use App\Models\Team;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
class DashboardController extends Controller
{
    public function index(){
        $franchise_count=Franchise::count();
        $visa_count=Visa::count();
        $business_evaluation=BusinessEvaluation::count();
        $business_sale=BusinessSaleFlow::count();
        $business_purchase=BusinessPurchaseFlow::count();
        $permissions=Permission::count();
        $roles=Role::count();
        $users=User::count();
        $blogs=Blog::count();
        $subscribers=Subscriber::count();
        $messages=Message::count();
        $team_members=Team::count();
        return view('portal.home',compact('blogs','subscribers','messages','team_members','permissions','roles','users'));
    }
}
