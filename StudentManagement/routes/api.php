<?php

use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\PasswordReset;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// register route
Route::post('/register', [UserController::class, 'register']);
// login with authentication:
Route::post('/login',[UserController::class, 'login']);

// sending password reset link on email
Route::post('/send_password_reset_mail',[PasswordResetController::class, 'send_password_reset_mail']);
// route to reset password using token
Route::post('/reset_password/{token}',[PasswordResetController::class, 'resetPassword']);


// Authenticating api's
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/search/{id}', [StudentController::class, 'show']);
    Route::post('/newstudent', [StudentController::class, 'store']);
    Route::put('/update/{id}', [StudentController::class, 'update']);
    Route::get('/delete/{id}', [StudentController::class, 'destroy']);

    // logged user details
    Route::get('/logged_user', [UserController::class, 'logged_user']);
    // change password
    Route::post('/change_password', [UserController::class, 'changePassword']);
    // logout route
    Route::post('/logout', [UserController::class, 'logout']);

});