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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/banner-list', [App\Http\Controllers\DashboardController::class, 'bannerList'])->name('bannerList');
    Route::get('/add-banner', [App\Http\Controllers\DashboardController::class, 'addBanner'])->name('addBanner');
    Route::post('/submit-banner', [App\Http\Controllers\DashboardController::class, 'submitBanner'])->name('submitBanner');
});