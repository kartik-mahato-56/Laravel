<?php

use App\Http\Controllers\EnquiryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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
