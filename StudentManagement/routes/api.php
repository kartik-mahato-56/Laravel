<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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
// Authenticating api's
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/search/{id}', [StudentController::class, 'show']);
    Route::post('/newstudent', [StudentController::class, 'store']);
    Route::put('/update/{id}', [StudentController::class, 'update']);
    Route::get('/delete/{id}', [StudentController::class, 'destroy']);


    // logout route
    Route::post('/logout', [UserController::class, 'logout']);

});