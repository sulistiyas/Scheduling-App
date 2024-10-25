<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\MessengerController;

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
    Route::get('/Driver/Schedule/Show/{id}', [DriverController::class, 'show_detail_order'])->name('show_detail_order_driver');
    Route::get('/Driver/Book', [DriverController::class, 'create_booking'])->name('create_book_driver');
    Route::post('/Driver/Book/Store', [DriverController::class, 'store_booking'])->name('store_book_driver');
    Route::post('/Driver/Book/Status', [DriverController::class, 'approve_driver'])->name('approve_driver');


    Route::get('/Driver/Send/WA', [DriverController::class, 'sendWa'])->name('sendWa');

    Route::get('/Messenger/Add', [MessengerController::class, 'index_create_messenger'])->name('index_create_messenger');
    Route::post('/Messenger/Store', [MessengerController::class, 'store_create_messenger'])->name('store_create_messenger');
    Route::get('/Messenger/Schedule', [MessengerController::class, 'index_schedule_messenger'])->name('index_schedule_messenger');
    Route::post('/Messenger/Schedule/Result', [MessengerController::class, 'index_result_messenger'])->name('index_result_messenger');
    Route::get('/Messenger/Schedule/Show/{id}', [MessengerController::class, 'show_detail_order'])->name('show_detail_order_messenger');
    Route::get('/Messenger/Book', [MessengerController::class, 'create_book_messenger'])->name('create_book_messenger');
    Route::post('/Messenger/Book/Store', [MessengerController::class, 'store_book_messenger'])->name('store_book_messenger');
    Route::post('/Messenger/Book/Status', [MessengerController::class, 'approve_messenger'])->name('approve_messenger');

    Route::get('/Messenger/Send/WA', [MessengerController::class, 'sendWaMessenger'])->name('sendWaMessenger');

    Route::post('/Email/Send', [UserController::class, 'sendMail'])->name('sendMail');
});
