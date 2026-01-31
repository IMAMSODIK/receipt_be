<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']); 

    Route::get('/data-box', [BoxController::class, 'index']);
    Route::get('/data-box/edit', [BoxController::class, 'edit']);
    Route::post('/data-box/store', [BoxController::class, 'store']);
    Route::post('/data-box/update', [BoxController::class, 'update']);
    Route::post('/data-box/delete', [BoxController::class, 'delete']);

    Route::post('/payment/snap', [PaymentController::class, 'createSnap']);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginCheck']);
});