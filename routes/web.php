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
Route::get('/blog-details/{id}', [App\Http\Controllers\WelcomeController::class, 'blogDetails'])->name('blogDetails');
Route::get('/submit-contact', [App\Http\Controllers\WelcomeController::class, 'submitContact'])->name('submitContact');


Route::get('/razorpay-payment', [App\Http\Controllers\RazorpayPaymentController::class, 'index'])->name('startPay');
Route::post('/razorpay-payment/order-save', [App\Http\Controllers\RazorpayPaymentController::class, 'paymentOrderSave'])->name('razorpayPaymentOrderSave');
Route::get('/payment/CreateOrder', [App\Http\Controllers\RazorpayPaymentController::class, 'paymentCreateOrder'])->name('razorpay.payment.create.order');
Route::post('/razorpay-payment', [App\Http\Controllers\RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');


Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/banner-list', [App\Http\Controllers\DashboardController::class, 'bannerList'])->name('bannerList');
    Route::get('/add-banner', [App\Http\Controllers\DashboardController::class, 'addBanner'])->name('addBanner');
    Route::post('/submit-banner', [App\Http\Controllers\DashboardController::class, 'submitBanner'])->name('submitBanner');
    Route::get('/edit-banner/{id}', [App\Http\Controllers\DashboardController::class, 'editBanner'])->name('editBanner');
    Route::get('/delete-banner', [App\Http\Controllers\DashboardController::class, 'deleteBanner'])->name('deleteBanner');
    Route::get('/contact-list', [App\Http\Controllers\DashboardController::class, 'contactList'])->name('contactList');
    Route::get('/delete-contact', [App\Http\Controllers\DashboardController::class, 'deleteContact'])->name('deleteContact');



    Route::get('/blog-list', [App\Http\Controllers\BlogController::class, 'blogList'])->name('blogList');
    Route::get('/add-blog', [App\Http\Controllers\BlogController::class, 'addBlog'])->name('addBlog');
    Route::post('/submit-blog', [App\Http\Controllers\BlogController::class, 'submitBlog'])->name('submitBlog');
    Route::get('/edit-blog/{id}', [App\Http\Controllers\BlogController::class, 'editBlog'])->name('editBlog');
    Route::get('/delete-blog', [App\Http\Controllers\BlogController::class, 'deleteBlog'])->name('deleteBlog');

    Route::get('/testimonial-list', [App\Http\Controllers\TestimonialController::class, 'testimonialList'])->name('testimonialList');
    Route::get('/add-testimonial', [App\Http\Controllers\TestimonialController::class, 'addTestimonial'])->name('addTestimonial');
    Route::post('/submit-testimonial', [App\Http\Controllers\TestimonialController::class, 'submitTestimonial'])->name('submitTestimonial');
    Route::get('/edit-testimonial/{id}', [App\Http\Controllers\TestimonialController::class, 'editTestimonial'])->name('editTestimonial');
    Route::get('/delete-testimonial', [App\Http\Controllers\TestimonialController::class, 'deleteTestimonial'])->name('deleteTestimonial');


    Route::get('/payment-list', [App\Http\Controllers\RazorpayPaymentController::class, 'PaymentList'])->name('PaymentList');

    Route::get('/packages-list', [App\Http\Controllers\PackagesController::class, 'packagesList'])->name('packagesList');
    Route::get('/add-packages', [App\Http\Controllers\PackagesController::class, 'addPackages'])->name('addPackages');
    Route::post('/submit-packages', [App\Http\Controllers\PackagesController::class, 'submitPackages'])->name('submitPackages');
    Route::get('/edit-packages/{id}', [App\Http\Controllers\PackagesController::class, 'editPackages'])->name('editPackages');
    Route::get('/delete-packages', [App\Http\Controllers\PackagesController::class, 'deletePackages'])->name('deletePackages');

});
