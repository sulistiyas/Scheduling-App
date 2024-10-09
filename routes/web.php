<?php

use App\Http\Controllers\DriverController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

    Route::get('/Driver/Schedule', [DriverController::class, 'index'])->name('index_driver');
});
