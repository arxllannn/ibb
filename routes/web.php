<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Portal\HomeController;
use App\Http\Controllers\Portal\RoleController;
use App\Http\Controllers\Portal\PermissionController;
use App\Http\Controllers\Portal\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\IntroController;
use App\Http\Controllers\Portal\BlogCategoriesController;
use App\Http\Controllers\Portal\BlogController;
use App\Http\Controllers\Portal\BusinessEvaluationController;
use App\Http\Controllers\Portal\ServiceController;
use App\Http\Controllers\Portal\DashboardController;
use App\Http\Controllers\Portal\BusinessSaleFlowController;
use App\Http\Controllers\Portal\BusinessPurchaseFlowController;
use App\Http\Controllers\Portal\VisaController;
use App\Http\Controllers\Portal\FranchiseController;
use App\Http\Controllers\Portal\TeamController;
use App\Http\Controllers\Portal\AboutUsController;
use App\Http\Controllers\Portal\ContentController;
use App\Http\Controllers\Portal\MessageController;
use App\Http\Controllers\Portal\SubscriberController;
use App\Http\Controllers\Portal\ResourceController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sell-business', [HomeController::class, 'sell_business'])->name('sell.business');
Route::get('/buy-business', [HomeController::class, 'buy_business'])->name('buy.business');
Route::get('/contactus', [HomeController::class, 'contactus'])->name('contactus');
Route::get('/buiness-evaluation', [HomeController::class, 'business_evaluation'])->name('business-evaluation');
Route::get('/visa-services', [HomeController::class, 'visa_services'])->name('visa-services');
Route::get('/franchise', [HomeController::class, 'franchise_services'])->name('franchise');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('blog');
Route::get('/blogs-by-category/{id}', [HomeController::class, 'blogs_by_category'])->name('blog_by_category');
Route::get('/blog-single/{id}', [HomeController::class, 'blog_single'])->name('blog-single');
Route::get('/team', [HomeController::class, 'team'])->name('team');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::post('/message', [MessageController::class, 'store'])->name('message.store');
Route::post('/message-send', [SubscriberController::class, 'store'])->name('subscriber.store');
Route::get('/resources', [HomeController::class, 'resources'])->name('resources');
Route::get('/business-search', [HomeController::class, 'business_search'])->name('business-search');
Route::get('/comming-soon', [HomeController::class, 'soon'])->name('soon');

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => '/admin'], function () {
    
        Route::group(['prefix' => '/dashboard'], function () {
            Route::get('/', [DashboardController::class, 'index'])->name('portal.dashboard')->middleware('checkpermission:view-admin-dashboard');
        });
        
        Route::group(['prefix' => '/roles'], function () {
            Route::get('/', [RoleController::class, 'index'])->name('portal.roles')->middleware('checkpermission:view-roles');
            Route::get('/add', [RoleController::class, 'add'])->name('portal.roles.add')->middleware('checkpermission:add-roles');
            Route::post('/store', [RoleController::class, 'store'])->name('portal.roles.store')->middleware('checkpermission:add-roles');
            Route::get('/list', [RoleController::class, 'list'])->name('portal.roles.list')->middleware('checkpermission:view-roles');
            Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('portal.roles.edit')->middleware('checkpermission:edit-roles');
            Route::post('/update/{id}', [RoleController::class, 'update'])->name('portal.roles.update')->middleware('checkpermission:edit-roles');
            Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('portal.roles.delete')->middleware('checkpermission:delete-roles');;
            Route::get('/{id}/permissions', [RoleController::class, 'permissions'])->name('portal.roles.permissions')->middleware('checkpermission:toggle-permissions');
            Route::post('/permissions/toggle/{role}', [RoleController::class,'togglePermission'])->name('portal.roles.permissions.toggle')->middleware('checkpermission:toggle-permissions');
        });

        Route::group(['prefix' => '/permissions'], function () {
            Route::get('/', [PermissionController::class, 'index'])->name('portal.permissions.index')->middleware('checkpermission:view-permissions');
            Route::get('/add', [PermissionController::class, 'add'])->name('portal.permissions.add')->middleware('checkpermission:add-permissions');
            Route::post('/store', [PermissionController::class, 'store'])->name('portal.permissions.store')->middleware('checkpermission:add-permissions');
            Route::get('/list', [PermissionController::class, 'list'])->name('portal.permissions.list')->middleware('checkpermission:view-permissions');
            Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('portal.permissions.edit')->middleware('checkpermission:edit-permissions');
            Route::get('/update/{id}', [PermissionController::class, 'update'])->name('portal.permissions.update')->middleware('checkpermission:edit-permissions');
            Route::get('/delete/{id}', [PermissionController::class, 'delete'])->name('portal.permissions.delete')->middleware('checkpermission:delete-permissions');;
        });

        Route::group(['prefix' => '/services-intro'], function () {
            Route::get('/', [IntroController::class, 'index'])->name('portal.intro.index');
            Route::get('/add', [IntroController::class, 'add'])->name('portal.intro.add');
            Route::post('/store', [IntroController::class, 'store'])->name('portal.intro.store');
            Route::get('/list', [IntroController::class, 'list'])->name('portal.intro.list');
            Route::get('/edit/{id}', [IntroController::class, 'edit'])->name('portal.intro.edit');
            Route::post('/update/{id}', [IntroController::class, 'update'])->name('portal.intro.update');
            Route::get('/delete/{id}', [IntroController::class, 'delete'])->name('portal.intro.delete');
        });


        Route::group(['prefix' => '/users'], function () {
            Route::get('/', [UserController::class, 'index'])->name('portal.users.index')->middleware('checkpermission:view-users');
            Route::get('/add', [UserController::class, 'add'])->name('portal.users.add')->middleware('checkpermission:add-users');
            Route::post('/store', [UserController::class, 'store'])->name('portal.users.store')->middleware('checkpermission:add-users');
            Route::get('/list', [UserController::class, 'list'])->name('portal.users.list')->middleware('checkpermission:view-users');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('portal.users.edit')->middleware('checkpermission:edit-users');
            Route::post('/update/{id}', [UserController::class, 'update'])->name('portal.users.update')->middleware('checkpermission:edit-users');
            Route::get('/delete/{id}', [UserController::class, 'delete'])->name('portal.users.delete')->middleware('checkpermission:delete-users');
            Route::get('/force-logout/{id}', [UserController::class, 'force_logout'])->name('portal.users.force.logout')->middleware('checkpermission:force-logout-users');
            Route::post('/users/change-password', [UserController::class, 'changePassword'])->name('portal.users.change-pass')->middleware('checkpermission:edit-users');
        });

        Route::group(['prefix' => '/services'], function () {
            Route::get('/', [ServiceController::class, 'index'])->name('portal.services.index')->middleware('checkpermission:view-services');
            Route::get('/add', [ServiceController::class, 'add'])->name('portal.services.add')->middleware('checkpermission:add-services');
            Route::post('/store', [ServiceController::class, 'store'])->name('portal.services.store')->middleware('checkpermission:add-services');
            Route::get('/list', [ServiceController::class, 'list'])->name('portal.services.list')->middleware('checkpermission:view-services');
            Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('portal.services.edit')->middleware('checkpermission:edit-services');
            Route::post('/update/{id}', [ServiceController::class, 'update'])->name('portal.services.update')->middleware('checkpermission:edit-services');
            Route::get('/delete/{id}', [ServiceController::class, 'delete'])->name('portal.services.delete')->middleware('checkpermission:delete-services');
        });

        Route::group(['prefix' => '/Sell-Business'], function () {
            Route::get('/', [BusinessSaleFlowController::class, 'index'])->name('portal.business-sale-flow.index')->middleware('checkpermission:manage-business-sale-flow');
            Route::get('/add', [BusinessSaleFlowController::class, 'add'])->name('portal.business-sale-flow.add')->middleware('checkpermission:manage-business-sale-flow');
            Route::post('/store', [BusinessSaleFlowController::class, 'store'])->name('portal.business-sale-flow.store')->middleware('checkpermission:manage-business-sale-flow');
            Route::get('/list', [BusinessSaleFlowController::class, 'list'])->name('portal.business-sale-flow.list')->middleware('checkpermission:manage-business-sale-flow');
            Route::get('/edit/{id}', [BusinessSaleFlowController::class, 'edit'])->name('portal.business-sale-flow.edit')->middleware('checkpermission:manage-business-sale-flow');
            Route::post('/update/{id}', [BusinessSaleFlowController::class, 'update'])->name('portal.business-sale-flow.update')->middleware('checkpermission:manage-business-sale-flow');
            Route::get('/delete/{id}', [BusinessSaleFlowController::class, 'delete'])->name('portal.business-sale-flow.delete')->middleware('checkpermission:manage-business-sale-flow');
        });

        Route::group(['prefix' => '/Purchase-Business'], function () {
            Route::get('/', [BusinessPurchaseFlowController::class, 'index'])->name('portal.business-purchase-flow.index')->middleware('checkpermission:manage-business-purchase-flow');
            Route::get('/add', [BusinessPurchaseFlowController::class, 'add'])->name('portal.business-purchase-flow.add')->middleware('checkpermission:manage-business-purchase-flow');
            Route::post('/store', [BusinessPurchaseFlowController::class, 'store'])->name('portal.business-purchase-flow.store')->middleware('checkpermission:manage-business-purchase-flow');
            Route::get('/list', [BusinessPurchaseFlowController::class, 'list'])->name('portal.business-purchase-flow.list')->middleware('checkpermission:manage-business-purchase-flow');
            Route::get('/edit/{id}', [BusinessPurchaseFlowController::class, 'edit'])->name('portal.business-purchase-flow.edit')->middleware('checkpermission:manage-business-purchase-flow');
            Route::post('/update/{id}', [BusinessPurchaseFlowController::class, 'update'])->name('portal.business-purchase-flow.update')->middleware('checkpermission:manage-business-purchase-flow');
            Route::get('/delete/{id}', [BusinessPurchaseFlowController::class, 'delete'])->name('portal.business-purchase-flow.delete')->middleware('checkpermission:manage-business-purchase-flow');
        });


        Route::group(['prefix' => '/business-evaluation'], function () {
            Route::get('/', [BusinessEvaluationController::class, 'index'])->name('portal.business-evaluation.index')->middleware('checkpermission:manage-business-evaluation');
            Route::get('/add', [BusinessEvaluationController::class, 'add'])->name('portal.business-evaluation.add')->middleware('checkpermission:manage-business-evaluation');
            Route::post('/store', [BusinessEvaluationController::class, 'store'])->name('portal.business-evaluation.store')->middleware('checkpermission:manage-business-evaluation');
            Route::get('/list', [BusinessEvaluationController::class, 'list'])->name('portal.business-evaluation.list')->middleware('checkpermission:manage-business-evaluation');
            Route::get('/edit/{id}', [BusinessEvaluationController::class, 'edit'])->name('portal.business-evaluation.edit')->middleware('checkpermission:manage-business-evaluation');
            Route::post('/update/{id}', [BusinessEvaluationController::class, 'update'])->name('portal.business-evaluation.update')->middleware('checkpermission:manage-business-evaluation');
            Route::get('/delete/{id}', [BusinessEvaluationController::class, 'delete'])->name('portal.business-evaluation.delete')->middleware('checkpermission:manage-business-evaluation');
        });
        Route::group(['prefix' => '/visa'], function () {
            Route::get('/', [VisaController::class, 'index'])->name('portal.visa.index')->middleware('checkpermission:manage-visa-services');
            Route::get('/add', [VisaController::class, 'add'])->name('portal.visa.add')->middleware('checkpermission:manage-visa-services');
            Route::post('/store', [VisaController::class, 'store'])->name('portal.visa.store')->middleware('checkpermission:manage-visa-services');
            Route::get('/list', [VisaController::class, 'list'])->name('portal.visa.list')->middleware('checkpermission:manage-visa-services');
            Route::get('/edit/{id}', [VisaController::class, 'edit'])->name('portal.visa.edit')->middleware('checkpermission:manage-visa-services');
            Route::post('/update/{id}', [VisaController::class, 'update'])->name('portal.visa.update')->middleware('checkpermission:manage-visa-services');
            Route::get('/delete/{id}', [VisaController::class, 'delete'])->name('portal.visa.delete')->middleware('checkpermission:manage-visa-services');
        });
        Route::group(['prefix' => '/franchise'], function () {
            Route::get('/', [FranchiseController::class, 'index'])->name('portal.franchise.index')->middleware('checkpermission:manage-franchise-services');
            Route::get('/add', [FranchiseController::class, 'add'])->name('portal.franchise.add')->middleware('checkpermission:manage-franchise-services');
            Route::post('/store', [FranchiseController::class, 'store'])->name('portal.franchise.store')->middleware('checkpermission:manage-franchise-services');
            Route::get('/list', [FranchiseController::class, 'list'])->name('portal.franchise.list')->middleware('checkpermission:manage-franchise-services');
            Route::get('/edit/{id}', [FranchiseController::class, 'edit'])->name('portal.franchise.edit')->middleware('checkpermission:manage-franchise-services');
            Route::post('/update/{id}', [FranchiseController::class, 'update'])->name('portal.franchise.update')->middleware('checkpermission:manage-franchise-services');
            Route::get('/delete/{id}', [FranchiseController::class, 'delete'])->name('portal.franchise.delete')->middleware('checkpermission:manage-franchise-services');
        });

        Route::group(['prefix' => '/blog-categories'], function () {
            Route::get('/', [BlogCategoriesController::class, 'index'])->name('portal.blog-categories.index')->middleware('checkpermission:manage-blog-categories');
            Route::get('/add', [BlogCategoriesController::class, 'add'])->name('portal.blog-categories.add')->middleware('checkpermission:manage-blog-categories');
            Route::post('/store', [BlogCategoriesController::class, 'store'])->name('portal.blog-categories.store')->middleware('checkpermission:manage-blog-categories');
            Route::get('/list', [BlogCategoriesController::class, 'list'])->name('portal.blog-categories.list')->middleware('checkpermission:manage-blog-categories');
            Route::get('/edit/{id}', [BlogCategoriesController::class, 'edit'])->name('portal.blog-categories.edit')->middleware('checkpermission:manage-blog-categories');
            Route::post('/update/{id}', [BlogCategoriesController::class, 'update'])->name('portal.blog-categories.update')->middleware('checkpermission:manage-blog-categories');
            Route::get('/delete/{id}', [BlogCategoriesController::class, 'delete'])->name('portal.blog-categories.delete')->middleware('checkpermission:manage-blog-categories');
        });

        Route::group(['prefix' => '/blogs'], function () {
            Route::get('/', [BlogController::class, 'index'])->name('portal.blog.index')->middleware('checkpermission:manage-blogs');
            Route::get('/add', [BlogController::class, 'add'])->name('portal.blog.add')->middleware('checkpermission:manage-blogs');
            Route::post('/store', [BlogController::class, 'store'])->name('portal.blog.store')->middleware('checkpermission:manage-blogs');
            Route::get('/list', [BlogController::class, 'list'])->name('portal.blog.list')->middleware('checkpermission:manage-blogs');
            Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('portal.blog.edit')->middleware('checkpermission:manage-blogs');
            Route::post('/update/{id}', [BlogController::class, 'update'])->name('portal.blog.update')->middleware('checkpermission:manage-blogs');
            Route::get('/delete/{id}', [BlogController::class, 'delete'])->name('portal.blog.delete')->middleware('checkpermission:manage-blogs');
        });


        Route::group(['prefix' => '/team'], function () {
            Route::get('/', [TeamController::class, 'index'])->name('portal.team.index');
            Route::get('/add', [TeamController::class, 'add'])->name('portal.team.add');
            Route::post('/store', [TeamController::class, 'store'])->name('portal.team.store');
            Route::get('/list', [TeamController::class, 'list'])->name('portal.team.list');
            Route::get('/edit/{id}', [TeamController::class, 'edit'])->name('portal.team.edit');
            Route::post('/update/{id}', [TeamController::class, 'update'])->name('portal.team.update');
            Route::get('/delete/{id}', [TeamController::class, 'delete'])->name('portal.team.delete');
        });

        Route::group(['prefix' => '/resource'], function () {
            Route::get('/', [ResourceController::class, 'index'])->name('portal.resource.index');
            Route::get('/add', [ResourceController::class, 'add'])->name('portal.resource.add');
            Route::post('/store', [ResourceController::class, 'store'])->name('portal.resource.store');
            Route::get('/list', [ResourceController::class, 'list'])->name('portal.resource.list');
            Route::get('/edit/{id}', [ResourceController::class, 'edit'])->name('portal.resource.edit');
            Route::post('/update/{id}', [ResourceController::class, 'update'])->name('portal.resource.update');
            Route::get('/delete/{id}', [ResourceController::class, 'delete'])->name('portal.resource.delete');
        });

        Route::group(['prefix' => '/about-us'], function () {
            Route::get('/', [AboutUsController::class, 'index'])->name('portal.about.index');
            Route::get('/add', [AboutUsController::class, 'add'])->name('portal.about.add');
            Route::post('/store', [AboutUsController::class, 'store'])->name('portal.about.store');
            Route::get('/list', [AboutUsController::class, 'list'])->name('portal.about.list');
            Route::get('/edit/{id}', [AboutUsController::class, 'edit'])->name('portal.about.edit');
            Route::post('/update/{id}', [AboutUsController::class, 'update'])->name('portal.about.update');
            Route::get('/delete/{id}', [AboutUsController::class, 'delete'])->name('portal.about.delete');
        });

        Route::group(['prefix' => '/messages'], function () {
            Route::get('/', [MessageController::class, 'index'])->name('portal.message.index');   
            Route::get('/list', [MessageController::class, 'list'])->name('portal.message.list');
            Route::get('/delete/{id}', [MessageController::class, 'delete'])->name('portal.message.delete');
        });

        Route::group(['prefix' => '/subscribers'], function () {
            Route::get('/', [SubscriberController::class, 'index'])->name('portal.subscriber.index');   
            Route::get('/list', [SubscriberController::class, 'list'])->name('portal.subscriber.list');
            Route::get('/delete/{id}', [SubscriberController::class, 'delete'])->name('portal.subscriber.delete');
            Route::get('/braodcast', [SubscriberController::class, 'broadcast'])->name('portal.subscriber.broadcast'); 
            Route::post('/subscriber/spread-broadcast', [SubscriberController::class, 'spreadBroadcast'])->name('portal.subcriber.spread-broadcast');

        });

        Route::group(['prefix' => '/content'], function () {
            Route::get('/{page_name}', [ContentController::class,'index'])->name('portal.content.index')->middleware('checkpermission:manage-content');
            Route::get('add/{page_name}', [ContentController::class,'add'])->name('portal.content.add')->middleware('checkpermission:manage-content');
            Route::post('store/{page_name}', [ContentController::class,'store'])->name('portal.content.store')->middleware('checkpermission:manage-content');
            Route::get('/list/{page_name}', [ContentController::class,'list'])->name('portal.content.list')->middleware('checkpermission:manage-content');
            Route::get('/edit/{id}/{page_name}', [ContentController::class,'edit'])->name('portal.content.edit')->middleware('checkpermission:manage-content');
            Route::post('/update/{id}/{page_name}', [ContentController::class, 'update'])->name('portal.content.update')->middleware('checkpermission:manage-content');
            Route::post('/update', [ContentController::class, 'updateHome'])->name('portal.content.updateHome')->middleware('checkpermission:manage-content');
            
        });
    });
});

Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Auth::routes();
