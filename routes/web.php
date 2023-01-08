<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//website home
Route::get('/',[AuthController::class,'index'])->name('login');

//Authentication
Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login');
//Route::get('/register',[AuthController::class,'registerPage'])->name('register');
//Route::post('/register',[AuthController::class,'register'])->name('register');

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');
//    Route::get('/dashboard',[HomeController::class,'index'])->name('home');
    Route::get('user/profile-edit',[\App\Http\Controllers\User\HomeController::class,'profileEdit'])->name('user.profile-edit');

    Route::post('user/user-update/{id}',[\App\Http\Controllers\User\HomeController::class,'profileUpdate'])->name('user.profile-update');
    Route::post('user/change-password/{id}',[\App\Http\Controllers\User\HomeController::class,'changePassword'])->name('user.change-password');

    //Employee leave
    Route::resource('employee-leave',\App\Http\Controllers\Employee\EmployeeLeaveController::class);

});

Route::post('/logout',[AuthController::class,'logOut'])->name('logout');



Route::middleware(['userRole:admin','auth'])->prefix('admin')->group(function(){
    //admin
    Route::get('home',[\App\Http\Controllers\Admin\HomeController::class,'index'])->name('admin.home');

//role assign
    Route::get('all-user',[\App\Http\Controllers\Admin\UserRoleController::class,'allUser'])->name('admin.all_user');
    Route::get('assign-role',[\App\Http\Controllers\Admin\UserRoleController::class,'userRole'])->name('admin.assign-role');
    Route::post('assign-role',[\App\Http\Controllers\Admin\UserRoleController::class,'assignRole'])->name('admin.assign-role');
    Route::get('manage-role',[\App\Http\Controllers\Admin\UserRoleController::class,'manageRole'])->name('admin.manage-role');
    Route::get('edit-role/{id}',[\App\Http\Controllers\Admin\UserRoleController::class,'editRole'])->name('admin.edit-role');
    Route::post('update-role/{id}',[\App\Http\Controllers\Admin\UserRoleController::class,'updateRole'])->name('admin.update-role');
    Route::get('delete-role/{id}',[\App\Http\Controllers\Admin\UserRoleController::class,'deleteRole'])->name('admin.delete-role');

    //user
    Route::get('user',[\App\Http\Controllers\Admin\UserController::class,'index'])->name('admin.user');
    Route::get('user-create',[\App\Http\Controllers\Admin\UserController::class,'create'])->name('admin.create-user');
    Route::post('user-create',[\App\Http\Controllers\Admin\UserController::class,'store'])->name('admin.create-user');
    Route::get('user-show/{id}',[\App\Http\Controllers\Admin\UserController::class,'show'])->name('admin.show-user');
    Route::get('user-edit/{id}',[\App\Http\Controllers\Admin\UserController::class,'edit'])->name('admin.edit-user');
    Route::post('user-update/{id}',[\App\Http\Controllers\Admin\UserController::class,'update'])->name('admin.update-user');
    Route::get('user-delete/{id}',[\App\Http\Controllers\Admin\UserController::class,'delete'])->name('admin.delete-user');
    Route::post('user/change-password/{id}',[\App\Http\Controllers\Admin\UserController::class,'changePassword'])->name('admin.user.change-password');

    Route::get('user/employee/{employeeId}',[\App\Http\Controllers\Admin\UserController::class,'employee'])->name('admin.user.employee');

    //company
    Route::resource('company',\App\Http\Controllers\Admin\CompanyController::class);

    //Employee
    Route::resource('employee',\App\Http\Controllers\Admin\EmployeeController::class);
    Route::get('/employee/user/{userId?}',[\App\Http\Controllers\Admin\EmployeeController::class,'user'])->name('employee.user');
    Route::get('/employee/ajax/{companyId}',[\App\Http\Controllers\Admin\EmployeeController::class,'companyLocation'])->name('employee.ajax');

    //Holiday
    Route::resource('holiday',\App\Http\Controllers\Admin\HolidayController::class);

    //Menu
    Route::resource('menu',\App\Http\Controllers\Admin\MenuController::class);
    Route::post('/menu-active/',[\App\Http\Controllers\Admin\MenuController::class,'menuActive'])->name('menu.active');
    Route::get('menu/pages/{menuId}',[\App\Http\Controllers\Admin\MenuController::class,'pages'])->name('menu.pages');

    //Page
    Route::resource('page',\App\Http\Controllers\Admin\PageController::class);
    Route::post('/page-active/',[\App\Http\Controllers\Admin\PageController::class,'pageActive'])->name('page.active');
    Route::get('page/page-item/{pageId?}',[\App\Http\Controllers\Admin\PageController::class,'pageItems'])->name('page.page-item');

    //Page-Item
    Route::resource('page-item',\App\Http\Controllers\Admin\PageItemController::class);
    Route::post('/page-item/active',[\App\Http\Controllers\Admin\PageItemController::class,'pageItemActive'])->name('page-item.active');
    Route::post('/page-item/editor',[\App\Http\Controllers\Admin\PageItemController::class,'pageItemEditor'])->name('page-item.editor');
    Route::post('/page-item/store-for-page/{pageId}',[\App\Http\Controllers\Admin\PageItemController::class,'storeForPage'])->name('page-item.storeForPage');
    Route::post('/page-item/page-item-delete/',[\App\Http\Controllers\Admin\PageItemController::class,'pageItemDelete'])->name('page-item.pageItemDelete');
    Route::get('/page-item/{pageId}/page-item-edit/{pageItemId}',[\App\Http\Controllers\Admin\PageItemController::class,'pageItemEdit'])->name('page-item.page-item-edit');
    Route::get('/page-item/{pageId}/page-item-delete/{pageItemId}',[\App\Http\Controllers\Admin\PageItemController::class,'pageItemDelete'])->name('page-item.page-item-delete');

    //Menu-Page
    Route::resource('menu-page',\App\Http\Controllers\Admin\MenuPageController::class);
    Route::post('/page-delete/',[\App\Http\Controllers\Admin\MenuPageController::class,'pageDelete'])->name('menu-page.pageDelete');
    Route::get('menu-page/page/{pageId}',[\App\Http\Controllers\Admin\MenuPageController::class,'page'])->name('menu-page.page');

    //BlogCategory
    Route::resource('blog-category',\App\Http\Controllers\Admin\BlogCategoryController::class);
    Route::post('/blog-category/active',[\App\Http\Controllers\Admin\BlogCategoryController::class,'blogCategoryActive'])->name('blog-category.active');

    //BlogSubCategory
    Route::resource('blog-sub-category',\App\Http\Controllers\Admin\BlogSubCategoryController::class);
    Route::post('/blog-sub-category/active',[\App\Http\Controllers\Admin\BlogSubCategoryController::class,'blogSubCategoryActive'])->name('blog-sub-category.active');

    //BlogPost
    Route::resource('blog-post',\App\Http\Controllers\Admin\BlogPostController::class);
    Route::post('/blog-post/active',[\App\Http\Controllers\Admin\BlogPostController::class,'blogPostActive'])->name('blog-post.active');

    //BlogCategoryPost
    Route::resource('blog-category-post',\App\Http\Controllers\Admin\BlogCategoryPostController::class);
    Route::post('/post-delete/',[\App\Http\Controllers\Admin\BlogCategoryPostController::class,'postIdDelete'])->name('blog-category-post.PostDelete');

    //BlogSubcategoryPost
    Route::resource('blog-subcategory-post',\App\Http\Controllers\Admin\BlogSubcategoryPostController::class);

    //Office Location
    Route::resource('office-location',\App\Http\Controllers\Admin\OfficeLocationController::class);
    Route::post('/office-location/active',[\App\Http\Controllers\Admin\OfficeLocationController::class,'officeLocationActive'])->name('office-location.active');

    //Leave
    Route::resource('leave',\App\Http\Controllers\Admin\LeaveController::class);
    Route::get('/leave/ajax/{userId?}',[\App\Http\Controllers\Admin\LeaveController::class,'employeeName'])->name('leave.ajax');
    Route::post('/leave/status',[\App\Http\Controllers\Admin\LeaveController::class,'leaveStatus'])->name('leave.status');

    //Employee Import Controller
    Route::resource('employee-import',\App\Http\Controllers\Admin\EmployeeImportController::class);

});

Route::middleware(['userRole:blog_admin','auth'])->group(function(){
    //Blog admin
    Route::get('/blog/home',[App\Http\Controllers\BlogAdmin\HomeController::class,'index'])->name('blog.home');
});
