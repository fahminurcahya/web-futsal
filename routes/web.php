<?php

use App\Http\Controllers\FieldController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimeSlotController;
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
        })->name('dashboard');

        Route::middleware('can:manage fields')->group(function () {
            Route::get('field', [FieldController::class, 'index'])->name('field');
            Route::get('field/create', [FieldController::class, 'create'])->name('field.create');
            Route::post('field', [FieldController::class, 'store'])->name('field.store');
            Route::get('field/{field}', [FieldController::class, 'show'])->name('field.show');
            Route::get('field/{field}/edit', [FieldController::class, 'edit'])->name('field.edit');
            Route::put('field/{field}', [FieldController::class, 'update'])->name('field.update');
            Route::delete('field/{field}', [FieldController::class, 'destroy'])->name('field.destroy');
            Route::put('timeslot/{timeSlot}', [TimeSlotController::class, 'update'])->name('timeslot.update');
        });

        Route::middleware('can:manage payment')->group(function () {
            Route::get('payment', [PaymentController::class, 'index'])->name('payment');
            Route::get('payment/create', [PaymentController::class, 'create'])->name('payment.create');
            Route::post('payment', [PaymentController::class, 'store'])->name('payment.store');
            Route::get('payment/{payment}', [PaymentController::class, 'show'])->name('payment.show');
            Route::get('payment/{payment}/edit', [PaymentController::class, 'edit'])->name('payment.edit');
            Route::put('payment/{payment}', [PaymentController::class, 'update'])->name('payment.update');
            Route::delete('payment/{payment}', [PaymentController::class, 'destroy'])->name('payment.destroy');
        });

        Route::middleware('can:manage payment')->group(function () {
            Route::get('booking', [PaymentController::class, 'index'])->name('booking');
            Route::get('booking/create', [PaymentController::class, 'create'])->name('booking.create');
            Route::post('booking', [PaymentController::class, 'store'])->name('booking.store');
            Route::get('booking/{booking}', [PaymentController::class, 'show'])->name('booking.show');
            Route::get('booking/{booking}/edit', [PaymentController::class, 'edit'])->name('booking.edit');
            Route::put('booking/{booking}', [PaymentController::class, 'update'])->name('booking.update');
            Route::delete('booking/{booking}', [PaymentController::class, 'destroy'])->name('booking.destroy');
        });
    });
});





require __DIR__ . '/auth.php';
