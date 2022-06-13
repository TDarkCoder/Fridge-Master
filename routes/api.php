<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::post('bookings/{room}', [BookingController::class, 'store']);
