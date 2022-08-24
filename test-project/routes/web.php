<?php

use App\Http\Controllers\EnquiryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\FeaturedProductController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Admin;
use App\Models\Banner;

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

Route::get('/about-us',[TestController::class, 'aboutUs'])->name('about-us');


Route::get('/living-room',[TestController::class,'livingRoom'])->name('living-room');


Route::get('/dining-room',[TestController::class,'diningRoom'])->name('dining-room');

Route::get('/bed-room',[TestController::class,'bedRoom'])->name('bed-room');

// loads the kitchen design page
Route::get('/kitchen',[TestController::class,'kitchen'])->name('kitchen');

// loads showroom interior design page
Route::get('/showroom-interior',[TestController::class, 'showRoom'])->name('showroom-interior');

// loads the hote-restaurant design page
Route::get('/hotel-restaurant',[TestController::class,'hotelRestaurant'])->name('hotel-restaurant');

// loads the corporate office page
Route::get('/corporate-office',[TestController::class, 'corporateOffice'])->name('corporate-office');

// loads the customer-stories page
Route::get('/customer-stories',[TestController::class, 'customerStories'])->name('customer-stories');

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


Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/account',[AdminController::class, 'account'])->name('account');
    // chart rout
    Route::get('/chart',[AdminController::class, 'chartLoad'])->name('chart');
    // route to show the table
    Route::get('/table',[AdminController::class, 'tableShow'])->name('table');
    
    // route to load form
    Route::get('/forms', [AdminController::class, 'loadForm'])->name('form');
    
    // route to load map
    Route::get('/maps',[AdminController::class, 'mapLoad'])->name('map');

    // route for update
    Route::post('/update',[AdminController::class, 'update_details'])->name('update');

    Route::get('/change_password', [AdminController::class, 'loadChangePassword'])->name('change_password_get');
    Route::post('/change_password', [AdminController::class, 'changePassword'])->name('change_password_post');


    // banner page load
    Route::get('/banner', [BannerController::class, 'index'])->name('banner');


    Route::get('/new_banner', [BannerController::class, 'new_banner'])->name('new_banner');
    Route::post('/banner_added', [BannerController::class, 'store'])->name('new_banner_post');
    Route::get('/banner_status/{id}', [BannerController::class, 'banner_status'])->name('banner_status');


    Route::get('/banner_edit/{id}',[BannerController::class, 'banner_edit'])->name('banner_edit');
    Route::post('/banner_edit', [BannerController::class, 'store'])->name('upadate_banner_details');

    // banner view rout::
    Route::get('/view_banner/{id}',[BannerController::class, 'view_banner'])->name('view_banner');

    // Delete banner view
    Route::get('/delete banner/{id}',[BannerController::class, 'delete_banner'])->name('delete_banner');


    // Featured Products
    Route::get('/product',[FeaturedProductController::class, 'index'])->name('featured_products');
    Route::get('/new_products',[FeaturedProductController::class, 'new_featured_products'])->name('new_featured_products');
    Route::post('/new_featured_products',[FeaturedProductController::class, 'store'])->name('new_featured_products_post');
    Route::get('/update-product-status/{id}',[FeaturedProductController::class, 'updateProductStatus'])->name('updateProductStatus');



    // Enquiry Routes
    Route::get('/enquiries',[AdminController::class,'enquiries'])->name('enquiries');

    // load reply enquiry blade
    
    Route::get('/reply_enquiry/{id}', [AdminController::class, 'replyEnquiryLoad'])->name('reply_enquiry');
    Route::post('/reply_enquiry',[AdminController::class, 'replyEnquirySubmit'])->name('reply_enquiry_post');
    Route::post('/enquiry_search',[AdminController::class, 'enquirySearch'])->name('enquiry_search_post');

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
