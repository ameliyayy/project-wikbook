<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;

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

// Route::get('/coba', function () {
//     return view('admin.cover');
// });

Route::middleware('isAdmin')->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');

    Route::get('/admin/user', [AdminController::class, 'index'])->name('admin-user');
    Route::get('/admin/user/update/{id}', [AdminController::class, 'edit'])->name('user-edit');
    Route::patch('/admin/user/update/store/{id}', [AdminController::class, 'update'])->name('user-update');
    Route::delete('/admin/user/delete/{id}', [AdminController::class, 'destroy'])->name('user-delete');

    Route::get('/admin/book', [BookController::class, 'index'])->name('admin-book');
    Route::post('/admin/book', [BookController::class, 'store'])->name('book-store');
    Route::get('/admin/book/cover/{id}', [BookController::class, 'showCover'])->name('book-cover');
    Route::delete('/admin/book/delete/{id}', [BookController::class, 'destroy'])->name('book-delete');
    Route::get('/admin/book/update/{id}', [BookController::class, 'edit'])->name('book-edit');
    Route::patch('/admin/book/update/store/{id}', [BookController::class, 'update'])->name('book-update');

    Route::get('/admin/category', [AdminController::class, 'category'])->name('admin-category');
    Route::post('/admin/category', [AdminController::class, 'store'])->name('category-store');
    Route::patch('/admin/category/update/{id}', [LoginController::class, 'update'])->name('category-update');
    Route::delete('/admin/category/delete/{id}', [LoginController::class, 'destroy'])->name('category-delete');
});

Route::middleware('isGuest')->group(function () {

    Route::get('/', function () {
        return view('dashboard.app');
    });

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register-store');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login-store');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
