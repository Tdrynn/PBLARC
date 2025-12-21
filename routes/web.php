<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChangePassController;
use App\Http\Controllers\ImageController;

use App\Http\Controllers\PackageController;
use App\Http\Controllers\PicnicController;
use App\Http\Controllers\CampingController;
use App\Http\Controllers\CampervanController;
use App\Http\Controllers\GroupEventController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (GUEST)
|--------------------------------------------------------------------------
*/

// Welcome Page
Route::middleware('redirect.auth')->group(function () {
    Route::get('/', [ReviewController::class, 'welcome'])->name('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::get('/login', function () {
    return view('auth.login'); // perhatikan: gunakan "auth.login" dengan titik
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Route::get('/picnic', function () {
//     return view('user.picnic');
// })->name('picnic');

// Route::get('/camping', function () {
//     return view('user.camping');
// })->name('camping');

// Route::get('/camperVan', function () {
//     return view('user.camperVan');
// })->name('camperVan');

// Route::get('/groupEvent', function () {
//     return view('user.groupEvent');
// })->name('groupEvent');

// Route::get('/camping', [ImageController::class, 'camping'])
//     ->name('camping');
// Route::get('/picnic', [ImageController::class, 'picnic'])
//     ->name('picnic');
// Route::get('/camperVan', [ImageController::class, 'camperVan'])
//     ->name('camperVan');
// Route::get('/groupEvent', [ImageController::class, 'groupEvent'])
//     ->name('groupEvent');


Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Package List
Route::get('/package', [PackageController::class, 'index'])->name('package');

// Package Detail / Learn More
Route::get('/picnic', [PicnicController::class, 'index'])->name('picnic');
Route::get('/camping', [CampingController::class, 'index'])->name('camping');
Route::get('/camperVan', [CampervanController::class, 'index'])->name('camperVan');
Route::get('/groupEvent', [GroupEventController::class, 'index'])->name('groupEvent');
Route::get('/FindOut', function () {
    return view('user.FindOut');
})->name('FindOut');

// Informational Pages
Route::get('/FindOut', fn () => view('user.FindOut'))->name('FindOut');
Route::get('/reviewList', [ReviewController::class, 'index'])->name('reviewList');
Route::get('/reviewList/all', [ReviewController::class, 'all'])->name('reviewList.all');


Route::middleware(['auth'])->group(function () {

    // Home
    Route::get('/home', [ReviewController::class, 'home'])->name('home');

    // Profile
    Route::get('/profile', fn () => view('user.profile'))->name('profile');
    Route::get('/changeprofile', fn () => view('user.change_profile'))->name('changeprofile');
    Route::get('/changepassword', fn () => view('user.change_password'))->name('changepassword');

    Route::put('/update-profile', [ProfileController::class, 'update'])->name('updateprofile');
    Route::put('/update-pass', [ChangePassController::class, 'update'])->name('updatepass');

    // History
    Route::get('/history', fn () => view('user.history'))->name('history');
    Route::post('/history', fn () => view('user.history'));

    /*
    |--------------------------------------------------------------------------
    | BOOKING FLOW
    |--------------------------------------------------------------------------
    */

    // Booking Forms
    Route::get('/bookingPicnic', [PicnicController::class, 'bookingForm'])
        ->name('bookingPicnic');

    Route::get('/bookingCamping', [CampingController::class, 'bookingForm'])
        ->name('bookingCamping');
    
    Route::get('/bookingCampervan', [CampervanController::class, 'bookingForm'])
        ->name('bookingCampervan');

    Route::get('/bookingGroupEvent', [GroupEventController::class, 'bookingForm'])
        ->name('bookingGroupEvent');

    Route::post('/check-availability', [BookingController::class, 'checkAvailability'])
        ->name('check.availability');

    Route::post('/booking/calculate-price', [BookingController::class, 'calculatePrice'])
        ->name('booking.calculatePrice');

    // Store Booking
    Route::post('/booking/store', [BookingController::class, 'store'])
        ->name('booking.store');

    /*
    |--------------------------------------------------------------------------
    | PAYMENT & INVOICE
    |--------------------------------------------------------------------------
    */

    Route::get('/payment/{booking}', [PaymentController::class, 'page'])
    ->name('payment.page');

    // snap token
    Route::post('/payment/snap/{booking}', [MidtransController::class, 'createSnapToken'])
        ->name('payment.snap');

    // redirect snap
    Route::get('/payment/success/{booking}', [PaymentController::class, 'success'])
        ->name('payment.success');

    Route::get('/payment/pending/{booking}', [PaymentController::class, 'pending'])
        ->name('payment.pending');

    // webhook midtrans
    Route::post('/payment/notification', [MidtransController::class, 'handle'])
        ->name('payment.notification');
    // Route::get('/payment', fn () => view('user.booking_payment'))->name('payment');
    Route::get('/paymentQris', fn () => view('user.payment_qris'))->name('paymentQris');
    Route::get('/paymentVirtualAccount', fn () => view('user.payment_virtualAccount'))
        ->name('paymentVirtualAccount');

    Route::get('/invoice', fn () => view('user.invoice'))->name('invoice');

    /*
    |--------------------------------------------------------------------------
    | REVIEW
    |--------------------------------------------------------------------------
    */

    Route::get('/review', fn () => view('user.review'))->name('review');
    Route::post('/review/store', [ReviewController::class, 'store'])
        ->name('review.store');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::put('/update-profile', [ProfileController::class, 'update'])->name('updateprofile');
    Route::put('/update-pass', [ChangePassController::class, 'update'])->name('updatepass');

    Route::get('/review', fn() => view('user.review'))->name('review');
    Route::post('review/store', [ReviewController::class, 'store'])->name('review.store');
    Route::get('/reviewList/all', [ReviewController::class, 'all'])->name('reviewList.all');
});
