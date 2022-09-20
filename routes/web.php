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
Route::post('/submit-contact', [App\Http\Controllers\WelcomeController::class, 'submitContact'])->name('submitContact');

Route::get('/questionaries', [App\Http\Controllers\WelcomeController::class, 'questionaries'])->name('questionaries');
Route::post('/submit-answer', [App\Http\Controllers\WelcomeController::class, 'submitAnswer'])->name('submitAnswer');


Route::get('/order-list', [App\Http\Controllers\WelcomeController::class, 'orderList'])->name('orderList');
Route::get('/user-order-details/{id}', [App\Http\Controllers\WelcomeController::class, 'userOrderDetails'])->name('userOrderDetails');
Route::get('/profile', [App\Http\Controllers\WelcomeController::class, 'profile'])->name('profile');
Route::post('/update-contact-info', [App\Http\Controllers\WelcomeController::class, 'contactInfo'])->name('contactInfo');
Route::post('/add-address', [App\Http\Controllers\WelcomeController::class, 'addAddress'])->name('addAddress');
Route::get('/edit-address', [App\Http\Controllers\WelcomeController::class, 'editAddress'])->name('editAddress');
Route::get('/delete-address', [App\Http\Controllers\WelcomeController::class, 'deleteAddress'])->name('deleteAddress');
Route::get('/default-address', [App\Http\Controllers\WelcomeController::class, 'defaultAddress'])->name('defaultAddress');
Route::get('/solution', [App\Http\Controllers\WelcomeController::class, 'solution'])->name('solution');
Route::get('/faq', [App\Http\Controllers\WelcomeController::class, 'faq'])->name('faq');

Route::get('/pay/{order_id}', [App\Http\Controllers\RazorpayPaymentController::class, 'pay'])->name('pay');


Route::get('/chat', [App\Http\Controllers\ChatController::class, 'allChats'])->name('allChats');
Route::post('/submit-chat', [App\Http\Controllers\ChatController::class, 'submitChats'])->name('submitChats');



Route::get('/razorpay-payment/{id}', [App\Http\Controllers\RazorpayPaymentController::class, 'index'])->name('startPay');
Route::post('/razorpay-payment/order-save', [App\Http\Controllers\RazorpayPaymentController::class, 'paymentOrderSave'])->name('razorpayPaymentOrderSave');
Route::get('/payment/CreateOrder', [App\Http\Controllers\RazorpayPaymentController::class, 'paymentCreateOrder'])->name('razorpay.payment.create.order');
Route::post('/razorpay-payment', [App\Http\Controllers\RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');


Auth::routes();

Route::middleware(['rolecheck'])->prefix('admin')->group(function () {
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
    Route::get('/order-details/{id}', [App\Http\Controllers\RazorpayPaymentController::class, 'orderDetails'])->name('orderDetails');
    Route::post('/allow-payment-assign-amount', [App\Http\Controllers\RazorpayPaymentController::class, 'assignAmount'])->name('assignAmount');

    Route::get('/packages-list', [App\Http\Controllers\PackagesController::class, 'packagesList'])->name('packagesList');
    Route::get('/add-packages', [App\Http\Controllers\PackagesController::class, 'addPackages'])->name('addPackages');
    Route::post('/submit-packages', [App\Http\Controllers\PackagesController::class, 'submitPackages'])->name('submitPackages');
    Route::get('/edit-packages/{id}', [App\Http\Controllers\PackagesController::class, 'editPackages'])->name('editPackages');
    Route::get('/delete-packages', [App\Http\Controllers\PackagesController::class, 'deletePackages'])->name('deletePackages');


    Route::get('/question-list', [App\Http\Controllers\QuestionController::class, 'questionsList'])->name('questionsList');
    Route::get('/add-question', [App\Http\Controllers\QuestionController::class, 'addQuestions'])->name('addQuestions');
    Route::post('/submit-question', [App\Http\Controllers\QuestionController::class, 'submitQuestions'])->name('submitQuestions');
    Route::get('/edit-question/{id}', [App\Http\Controllers\QuestionController::class, 'editQuestions'])->name('editQuestions');
    Route::get('/delete-question', [App\Http\Controllers\QuestionController::class, 'deleteQuestions'])->name('deleteQuestions');

    Route::post('/submit-solution', [App\Http\Controllers\SolutionController::class, 'submitSolution'])->name('submitSolution');
    Route::get('/delete-solution', [App\Http\Controllers\SolutionController::class, 'deleteSolution'])->name('deleteSolution');


    Route::get('/adminuser-list', [App\Http\Controllers\AdminuserController::class, 'adminuserList'])->name('adminuserList');
    Route::get('/add-admin-user', [App\Http\Controllers\AdminuserController::class, 'addAdminuser'])->name('addAdminuser');
    Route::post('/submit-admin-user', [App\Http\Controllers\AdminuserController::class, 'submitAdminuser'])->name('submitAdminuser');
    Route::get('/edit-admin-user/{id}', [App\Http\Controllers\AdminuserController::class, 'editAdminuser'])->name('editAdminuser');
    Route::get('/delete-admin-user', [App\Http\Controllers\AdminuserController::class, 'deleteAdminuser'])->name('deleteAdminuser');

    Route::get('/quick-link-list', [App\Http\Controllers\QuickLinkController::class, 'quickLinksList'])->name('quickLinksList');
    Route::get('/add-quick-link', [App\Http\Controllers\QuickLinkController::class, 'addQuicklinks'])->name('addQuicklinks');
    Route::post('/submit-quick-link', [App\Http\Controllers\QuickLinkController::class, 'submitQuicklinks'])->name('submitQuicklinks');
    Route::get('/edit-quick-link/{id}', [App\Http\Controllers\QuickLinkController::class, 'editQuicklinks'])->name('editQuicklinks');
    Route::get('/delete-quick-link', [App\Http\Controllers\QuickLinkController::class, 'deleteQuicklinks'])->name('deleteQuicklinks');

    Route::get('/our-work-list', [App\Http\Controllers\QuickLinkController::class, 'ourWorkList'])->name('ourWorkList');
    Route::get('/add-our-work', [App\Http\Controllers\QuickLinkController::class, 'addOurWork'])->name('addOurWork');
    Route::post('/submit-our-work', [App\Http\Controllers\QuickLinkController::class, 'submitOurWork'])->name('submitOurWork');
    Route::get('/edit-our-work/{id}', [App\Http\Controllers\QuickLinkController::class, 'editOurWork'])->name('editOurWork');
    Route::get('/delete-our-work', [App\Http\Controllers\QuickLinkController::class, 'deleteOurWork'])->name('deleteOurWork');


    Route::get('/booking-police-list', [App\Http\Controllers\QuickLinkController::class, 'bookingPolicieList'])->name('bookingPolicieList');
    Route::get('/refund-police-list', [App\Http\Controllers\QuickLinkController::class, 'refundPolicieList'])->name('refundPolicieList');
    Route::get('/term-condition-list', [App\Http\Controllers\QuickLinkController::class, 'termConditionsList'])->name('termConditionsList');
    Route::get('/policies-add/{slug}', [App\Http\Controllers\QuickLinkController::class, 'addPolicies'])->name('addPolicies');
    Route::post('/submit-policies', [App\Http\Controllers\QuickLinkController::class, 'submitPolicies'])->name('submitPolicies');
    Route::get('/edit-policies/{id}', [App\Http\Controllers\QuickLinkController::class, 'editPolicies'])->name('editPolicies');
    Route::get('/delete-policies', [App\Http\Controllers\QuickLinkController::class, 'deletePolicies'])->name('deletePolicies');
});