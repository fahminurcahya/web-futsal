<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {

        Route::get('dashboard', function () {
            return view('admin.dashboard.index');
        })->name('dashboard.index');
        Route::get('payment', function () {
            return view('admin.payment.index');
        })->name('payment.index');
        Route::get('booking', function () {
            return view('admin.bookings.index');
        })->name('booking.index');
        Route::get('field', function () {
            return view('admin.fields.index');
        })->name('field.index');
        Route::get('timeslot', function () {
            return view('admin.timeslot.index');
        })->name('timeslot.index');
        Route::get('user', function () {
            return view('admin.users.index');
        })->name('user.index');
    });
});





require __DIR__ . '/auth.php';
