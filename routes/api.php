<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MidtransController;

Route::post('/payment/notification', [MidtransController::class, 'notification']);