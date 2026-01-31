<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Semua route di sini otomatis pakai prefix /api
| dan middleware "api"
|--------------------------------------------------------------------------
*/

Route::post('/payment/snap', [PaymentController::class, 'createSnap']);