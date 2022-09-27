<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Models\Admin;

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

// Routes for admin login
Route::get('/admin_login', [AdminController::class, 'index'])->name('login_view');
Route::post('/admin_auth', [AdminController::class, 'adminAuth'])->name('admin_auth');

// Routes for admin regiastration
Route::get('/register', [AdminController::class, 'registerFormLoad'])->name('register_view');
Route::post('/register_auth',[AdminController::class, 'registerAuth'])->name('register_auth');

Route::middleware('admin_auth')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'loadDashboard'])->name('dashboard');
});