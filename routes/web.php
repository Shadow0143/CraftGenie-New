<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [App\Http\Controllers\WelcomeController::class, 'welcome'])->name('welcome');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/banner-list', [App\Http\Controllers\DashboardController::class, 'bannerList'])->name('bannerList');
    Route::get('/add-banner', [App\Http\Controllers\DashboardController::class, 'addBanner'])->name('addBanner');
    Route::post('/submit-banner', [App\Http\Controllers\DashboardController::class, 'submitBanner'])->name('submitBanner');
    Route::get('/edit-banner/{id}', [App\Http\Controllers\DashboardController::class, 'editBanner'])->name('editBanner');
    Route::get('/delete-banner', [App\Http\Controllers\DashboardController::class, 'deleteBanner'])->name('deleteBanner');


    Route::get('/blog-list', [App\Http\Controllers\BlogController::class, 'blogList'])->name('blogList');
    Route::get('/add-blog', [App\Http\Controllers\BlogController::class, 'addBlog'])->name('addBlog');
    Route::post('/submit-blog', [App\Http\Controllers\BlogController::class, 'submitBlog'])->name('submitBlog');
    Route::get('/edit-blog/{id}', [App\Http\Controllers\BlogController::class, 'editBlog'])->name('editBlog');
    Route::get('/delete-blog', [App\Http\Controllers\BlogController::class, 'deleteBlog'])->name('deleteBlog');
});
