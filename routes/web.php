<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChangePassController;

Route::middleware('redirect.auth')->group(function () {
    Route::get('/', [ReviewController::class, 'welcome'])->name('welcome');
});

Route::get('/login', function () {
    return view('auth.login'); // perhatikan: gunakan "auth.login" dengan titik
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/picnic', function () {
    return view('user.picnic');
})->name('picnic');

Route::get('/camping', function () {
    return view('user.camping');
})->name('camping');

Route::get('/camperVan', function () {
    return view('user.camperVan');
})->name('camperVan');

Route::get('/groupEvent', function () {
    return view('user.groupEvent');
})->name('groupEvent');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/package', function () {
    return view('user.package');
})->name('package');

Route::get('/FindOut', function() {
    return view('user.FindOut');
})->name('FindOut');

Route::get('/reviewList', [ReviewController::class, 'index'])->name('reviewList');


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [ReviewController::class, 'home'])->name('home');

    Route::get('/profile', function () {
        return view('user.profile');
    })->name('profile');

    Route::get('/history', function () {
        return view('user.history');
    })->name('history');
    Route::post('/history', function () {
        return view('user.history');
    })->name('history');

    Route::get('/changeprofile', function () {
        return view('user.change_profile');
    })->name('changeprofile');

    Route::get('/changepassword', function () {
        return view('user.change_password');
    })->name('changepassword');


    Route::get('/bookingPicnic', function () {
        return view('user.booking_picnic');
    })->name('bookingPicnic');

    Route::get('/bookingCamping', function () {
        return view('user.booking_camping');
    })->name('bookingCamping');

    Route::get('/bookingCampervan', function () {
        return view('user.booking_campervan');
    })->name('bookingCampervan');

    Route::get('/bookingGroupEvent', function () {
        return view('user.booking_groupEvent');
    })->name('bookingGroupEvent');

    Route::get('/payment', function () {
        return view('user.payment');
    })->name('payment');

    Route::get('/paymentQris', function () {
        return view('user.payment_qris');
    })->name('paymentQris');

    Route::get('/paymentVirtualAccount', function () {
        return view('user.payment_virtualAccount');
    })->name('paymentVirtualAccount');

    Route::get('/invoice', function () {
        return view('user.invoice');
    })->name('invoice');

    Route::get('/review', function () {
        return view('user.review');
    })->name('review');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::put('/update-profile', [ProfileController::class, 'update'])->name('updateprofile');
    Route::put('/update-pass', [ChangePassController::class, 'update'])->name('updatepass');

    Route::get('/review', fn() => view('user.review'))->name('review');
    Route::post('review/store', [ReviewController::class, 'store'])->name('review.store');
    Route::get('/reviewList/all', [ReviewController::class, 'all'])->name('reviewList.all');
});