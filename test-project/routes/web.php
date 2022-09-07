<?php

use App\Http\Controllers\EnquiryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\FeaturedProductController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Admin;
use App\Models\Banner;
use App\Models\FeaturedProduct;

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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/',[TestController::class, 'index'])->name('index');


Route::get('/pages/{slug}',[TestController::class, 'pageLoad'])->name('service-pages');



// loads the contact us page
Route::get('/contact', [TestController::class,'contact'])->name('contact');

// loads the terms and conditions page
Route::get('/terms-conditions', [TestController::class, 'termAndCondition'])->name('terms-conditions');


Route::post('/enquiry',[EnquiryController::class, 'enquiry'])->name('enquiry');

Route::get('/thank-you', function(){
    return view('thankyou');
});

Route::get('/admin',[AdminController::class, 'index'])->name('admin');
Route::post('/dashboard', [AdminController::class, 'login'])->name('login');

Route::get('/register',[AdminController::class, 'register'])->name('register');
Route::post('/signed_up', [AdminController::class, 'store'])->name('signed_up');

// dashboard route
// forget password route
Route::get('/forget_password',[AdminController::class,'forgetPassword'])->name('forget-pass');
Route::post('/forget',[AdminController::class, 'forgetPassword_'])->name('forget');

Route::get('/otp_verification', [AdminController::class, 'otp_verification'])->name('otp_verify');

// admin pannel routes:all this route will work after admin login
Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/account',[AdminController::class, 'account'])->name('account');
   

    // route for update
    Route::post('/update',[AdminController::class, 'update_details'])->name('update');

    Route::get('/change_password', [AdminController::class, 'loadChangePassword'])->name('change_password_get');
    Route::post('/change_password', [AdminController::class, 'changePassword'])->name('change_password_post');


    // banners routes
    Route::get('/banner', [BannerController::class, 'index'])->name('banner');
    Route::get('/new_banner', [BannerController::class, 'new_banner'])->name('new_banner');
    Route::post('/banner_added', [BannerController::class, 'store'])->name('new_banner_post');
    Route::get('/banner_status/{id}', [BannerController::class, 'banner_status'])->name('banner_status');
    Route::get('/view_banner/{id}',[BannerController::class, 'view_banner'])->name('view_banner');
    Route::get('/banner_edit/{id}',[BannerController::class, 'banner_edit'])->name('banner_edit');
    Route::post('/banner_edit', [BannerController::class, 'store'])->name('upadate_banner_details');
    
    Route::get('/view_banner/{id}',[BannerController::class, 'view_banner'])->name('view_banner');
    // Delete banner view
    Route::get('/delete banner/{id}',[BannerController::class, 'delete_banner'])->name('delete_banner');

    // Featured Products
    Route::get('/featured_products',[FeaturedProductController::class, 'index'])->name('featured_products');
    Route::get('/new_products',[FeaturedProductController::class, 'new_featured_products'])->name('new_featured_products');
    Route::post('/new_featured_products',[FeaturedProductController::class, 'store'])->name('new_featured_products_post');
    Route::get('/update-product-status/{id}',[FeaturedProductController::class, 'updateProductStatus'])->name('updateProductStatus');
    Route::get('/show_product/{id}',[FeaturedProductController::class, 'showProduct'])->name('show-product');
    Route::get('/edit_product/{id}',[FeaturedProductController::class, 'editProduct'])->name('edit_product');

    Route::get('/delete_product/{id}',[FeaturedProductController::class, 'destroy'])->name('delete_product');

    // menu bar and pages route
        // menubar & pages  routes:
    Route::get('/main_page_list', [PageController::class, 'listMainPage'])->name('main_page_list');
    Route::get('/new_main_page', [PageController::class, 'newMainPage'])->name('new_main_page');
    Route::post('/new_main_page', [PageController::class, 'newMainPageSubmit'])->name('new_main_page_submit');
    
    
    Route::get('/sub_page_list', [PageController::class, 'listSubPages'])->name('sub_page_list');
    Route::get('/new_sub_page', [PageController::class, 'newSubPage'])->name('new_sub_page');
    Route::post('/new_sub_page', [PageController::class, 'subPageSubmit'])->name('sub_page_submit');

    Route::get('/page_details', [PageController::class, 'pageDetails'])->name('page_details');
    Route::get('/getsubpage', [PageController::class, 'getsubpage'])->name('getsubpage');
    Route::get('/getsubpagedetails', [PageController::class, 'getsubpagedetails'])->name('getsubpagedetails');

    Route::post('/page_details',[ PageController::class, 'pageDetailsSubmit'])->name('page_details_submit');
    Route::get('/main_page_status/{id}', [PageController::class, 'mainPageStatus'])->name('main_page_status');
    Route::get('/sub_page_status/{id}', [PageController::class, 'subPageStatus'])->name('sub_page_status');

    Route::get('/main_page_info/{slug}', [PageController::class, 'mainPageInfo'])->name('main_page_info');
    
    
    
    // Enquiry Routes
    Route::get('/enquiries',[AdminController::class,'enquiries'])->name('enquiries');
    // load reply enquiry blade
    Route::get('/reply_enquiry/{id}', [AdminController::class, 'replyEnquiryLoad'])->name('reply_enquiry');
    Route::post('/reply_enquiry',[AdminController::class, 'replyEnquirySubmit'])->name('reply_enquiry_post');
    Route::post('/enquiries',[AdminController::class, 'enquirySearch'])->name('enquiry_search_post');
    Route::get('/reply_enquiry_show/{id}',[AdminController::class, 'reply_enquiry_show'])->name('reply_enquiry_show');
    Route::post('/delete_enquiry/{id}', [AdminController::class, 'delete_enquiry'])->name('delete_enquiry');


    // menubar & pages  routes:
    

    // logout route
    Route::get('/logout',[AdminController::class, 'logout'])->name('logout');
});

/*

DB::table('allergies')->insert(array(
    0 =>
    array(
        'id'=>1,
        'allergy' => 'Drug Allergy',
        'status'=>1
    ),
    1 =>
    array(
        'id'=>2,
        'allergy' => 'Food Allergy',
        'status'=>1
    ),
    2 =>
    array(
        'id'=>3,
        'allergy' => 'Insect Allergy',
        'status'=>1
    ),

    */
