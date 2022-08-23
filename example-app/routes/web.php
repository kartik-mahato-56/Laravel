<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\AdminController;


use function Ramsey\Uuid\v1;

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
// Route for load the signup.blade with all tha user details showing on the right table
Route::get('/',[StudentController::class,'index'])->name('index');

// route for registration
Route::post('/', [StudentController::class, 'store'])->name('signup');

// Route to show the addqualification page
Route::get('/qualification', [QualificationController::class,'index'])->name('qualification');

// route to add new qualification
Route::post('/qualification', [QualificationController::class, 'store'])->name('addqualification');

//Route for calling the update.blade page with user id:
Route::get('/update/{id}',[StudentController::class, 'edit'])->name('edit_details');

// Route for updating user data
Route::post('/update', [StudentController::class, 'store'])->name('update');

// Route for delete any student details
Route::get('/delete/{id}', [StudentController::class,'destroy'])->name('delete');

// Route to loads the edit qualification page
Route::get('/edit_qualification/{qual_id}',[QualificationController::class, 'edit'])->name('edit_qualification');

// show student details;
Route::get('/show_details/{id}', [StudentController::class, 'show'])->name('show_details');


Route::get('/admin',[AdminController::class, 'index'])->name('admin');
Route::post('/dashboard', [AdminController::class, 'login'])->name('login');

Route::get('/register',[AdminController::class, 'register'])->name('register');
Route::post('/signed_up', [AdminController::class, 'store'])->name('signed_up');

// dashboard route
// forget password route
Route::get('/forget_password',[AdminController::class,'forgetPassword'])->name('forget-pass');


Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    // chart rout
    Route::get('/chart',[AdminController::class, 'chartLoad'])->name('chart');
    // route to show the table
    Route::get('/table',[AdminController::class, 'tableShow'])->name('table');
    
    // route to load form
    Route::get('/forms', [AdminController::class, 'loadForm'])->name('form');
    
    // route to load map
    Route::get('/maps',[AdminController::class, 'mapLoad'])->name('map');

    Route::get('/logout',[AdminController::class, 'logout'])->name('logout');
});
    

