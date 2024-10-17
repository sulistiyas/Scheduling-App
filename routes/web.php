<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;
use App\Mail\SendEmailUserInformation;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('dashboard');

    Route::get('/Admin/User', [UserController::class, 'index'])->name('index_user');
    Route::get('/Admin/User/View/{id}', [UserController::class, 'show'])->name('show_users');
    Route::post('/Admin/User/Store', [UserController::class, 'store'])->name('store_users');
    Route::get('/Admin/User/Edit/{id}', [UserController::class, 'edit'])->name('edit_users');
    Route::post('/Admin/User/Update/{id}', [UserController::class, 'update'])->name('update_users');
    Route::delete('/Admin/User/Delete/{id}', [UserController::class, 'destroy'])->name('destroy_users');

    Route::get('/Driver/Add', [DriverController::class, 'index_create_driver'])->name('index_create_driver');
    Route::post('/Driver/Store', [DriverController::class, 'store_create_driver'])->name('store_create_driver');
    Route::get('/Driver/Schedule', [DriverController::class, 'index_schedule_driver'])->name('index_driver');
    Route::post('/Driver/Schedule/Result', [DriverController::class, 'index_result_driver'])->name('index_result_driver');
    Route::get('/Driver/Book', [DriverController::class, 'create_booking'])->name('create_book_driver');
    Route::post('/Driver/Book/Store', [DriverController::class, 'store_booking'])->name('store_book_driver');

    Route::get('/Driver/Send/WA', [DriverController::class, 'sendWa'])->name('sendWa');
    Route::post('/Email/Send', [UserController::class, 'sendMail'])->name('sendMail');
});
