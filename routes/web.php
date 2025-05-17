<?php

use App\Http\Controllers\Auth\RoleAndPermissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerimagesController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\DiscountTypeController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ParkController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PromotionalPosterController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SubscriptionBenefitController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\SupportTypeController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\TicketTypeController;
use App\Http\Controllers\UserNotificationController;
use App\Http\Controllers\Website\ProfileController;
use App\Http\Controllers\Website\WebsiteController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    return "Cache,Config is cleared";
});

Route::get('/', [WebsiteController::class, 'index'])->name('website.home');
Route::get('details/{slug}', [WebsiteController::class, 'details'])->name('website.park.details');
Route::post('reviews/{park_id}/store', [WebsiteController::class, 'reviewStore'])->name('website.reviews.store');
Route::get('/faq', [WebsiteController::class, 'faq'])->name('website.faq');
Route::get('/favorites-park', [WebsiteController::class, 'favorites'])->name('website.favorites');
Route::get('/about', [WebsiteController::class, 'about'])->name('website.about');
Route::get('/support', [WebsiteController::class, 'support'])->name('website.support');
Route::post('/support/ticket/create', [WebsiteController::class, 'ticket_create'])->name('website.ticket_create');
Route::get('/gallery', [WebsiteController::class, 'categoryGallery'])->name('website.categoryGallery');
Route::get('/gallery/{slug}', [WebsiteController::class, 'gallery'])->name('website.gallery');

Route::get('/details', function () {
    return view('website.details');
})->name('website.details');

// Route::get('/gallery', function () {
//     return view('website.category-gallery');
// })->name('website.gallery');
// Route::get('/gallery/{slug}', function (Requset $requset, $slug) {
//     return view('website.gallery');
// })->name('website.gallery');

Route::get('/error', function () {
    return view('website.error');
})->name('website.error');

Route::get('/maintenance', function () {
    return view('website.maintenance');
})->name('website.maintenance');

Route::get('/refer-earn', function () {
    return view('website.refer-earn');
})->name('website.refer-earn');

Route::get('/admin', function () {
    return redirect('/admin/home');
})->name('admin.dashboard');

Auth::routes();

Route::post('/request-otp', [AuthController::class, 'requestOtp'])->name('sendotp');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verifyotp');
Route::post('/getdistricts', [Controller::class, 'getdistricts'])->name('getdistricts');
// Route::put('/customer/profile/{id}', [AuthController::class, 'update'])->name('customerProfile.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('testimonials', TestimonialsController::class);
Route::resource('bannerimages', BannerimagesController::class);
Route::resource('category', CategoryController::class);
Route::resource('faq', FaqController::class);


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('parks', ParkController::class);
Route::resource('testimonials', TestimonialsController::class);
Route::resource('bannerimages', BannerimagesController::class);
Route::resource('category', CategoryController::class);
Route::resource('faq', FaqController::class);
// Route::get('/profile', [ProfileController::class, 'index'])->name('website.profile');
// Route::get('/profile', [ProfileController::class, 'index'])->name('website.profile');

Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
Route::post('/favorite/toggle/{park_id}', [FavoriteController::class, 'addFavorite'])->name('favorite.toggle');
Route::post('/favorite/remove/{park_id}', [FavoriteController::class, 'removeFavorite'])->name('favorite.remove');


Route::middleware("auth")->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('website.profile');
    Route::put('/customer/profile/{id}', [AuthController::class, 'update'])->name('customerProfile.update');
});


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('roles', [RoleAndPermissionController::class, 'index'])->name('roles.index');
    Route::get('roles/create', [RoleAndPermissionController::class, 'create'])->name('roles.create');
    Route::post('roles', [RoleAndPermissionController::class, 'store'])->name('roles.store');
    Route::get('roles/{role}/edit', [RoleAndPermissionController::class, 'edit'])->name('roles.edit');
    Route::put('roles/{role}', [RoleAndPermissionController::class, 'update'])->name('roles.update');
    Route::delete('roles/{role}', [RoleAndPermissionController::class, 'destroy'])->name('roles.destroy');

    Route::get('permissions', [RoleAndPermissionController::class, 'createPermission'])->name('permissions.create');
    Route::post('permissions', [RoleAndPermissionController::class, 'storePermissions'])->name('permissions.store');


    Route::get('roles/{role}/permissions', [RoleAndPermissionController::class, 'permissions'])->name('roles.permissions');
    Route::post('roles/{role}/permissions', [RoleAndPermissionController::class, 'assignPermissions'])->name('roles.assignPermissions');

    Route::get('student/assignRole', [RoleAndPermissionController::class, 'student_assignRole'])->name('student.assignRole');

    // Route::get('profile',)
});


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('ticketType', TicketTypeController::class);
    Route::get('reviews', [HomeController::class, 'reviews']);
    Route::delete('reviews/{review}/delete', [HomeController::class, 'review_delete'])->name('reviews.destroy');
    Route::post('reviews/{review}/updateStatus', [HomeController::class, 'review_updateStatus'])->name('reviews.updateStatus');
    Route::resource('discount_type', DiscountTypeController::class);
    Route::resource('discount', DiscountController::class);
    Route::resource('plan', PlanController::class);
    Route::resource('subscriptionBenefit', SubscriptionBenefitController::class);
    Route::resource('subscription', SubscriptionController::class);
    Route::resource('support_type', SupportTypeController::class);
    Route::resource('support_ticket', SupportTicketController::class);
    Route::post('support_ticket/reply', [SupportTicketController::class, 'reply'])->name('support_ticket.reply');
    Route::resource('promotional_poster', PromotionalPosterController::class);
    Route::resource('user_notification', UserNotificationController::class);
    Route::get('customers', [AuthController::class, 'customers'])->name('admin.customers');
    Route::get('customers/{wallet_id}/wallet', [AuthController::class, 'walletHistory'])->name('admin.customers.walletHistory');
    Route::delete('customers/{user}/delete', [AuthController::class, 'destroy'])->name('admin.customers.destroy');


    Route::resource('parks', ParkController::class);
    Route::resource('testimonials', TestimonialsController::class);
    Route::resource('bannerimages', BannerimagesController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('faq', FaqController::class);
    // Route::get('/profile', [ProfileController::class, 'index'])->name('website.profile');

    // booking
    Route::post('booking/checkout', [BookingController::class, 'bookingCheckout'])->name('booking.checkout');
    Route::get('booking/{orderId}/checkout', [HomeController::class, 'CheckoutFun'])->name("booking.payment");
    Route::post('booking/{orderId}/complete', [BookingController::class, 'completeBooking'])->name('booking.complete');
    Route::get('ticket-booking', [BookingController::class, 'bookingList']);


    // staff
    Route::resource('staff', StaffController::class);
});

// Route::middleware(['role:'. User::ROLE_USER])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'index'])->name('website.profile');
// });