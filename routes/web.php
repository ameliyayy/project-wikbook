<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

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

// Route::get('/coba', function () {
//     return view('admin.dashboard');
// });

Route::middleware('isAdmin')->group(function(){

    Route::get('/admin/user', [AdminController::class, 'index'])->name('admin-user');
});

Route::get('/', function () {
    return view('dashboard.app');
});

// Logout
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register-store');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login-store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::patch('/admin/user/update', [AdminController::class, 'update'])->name('user-update');
Route::delete('/admin/user/delete', [AdminController::class, 'destroy'])->name('user-delete');