<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\MidtransController;
use App\Models\Transaction;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Semua route di sini otomatis pakai prefix /api
| dan middleware "api"
|--------------------------------------------------------------------------
*/

Route::post('/payment/snap', [PaymentController::class, 'createSnap']);

Route::post('/midtrans/webhook', [MidtransController::class, 'handle']);
Route::get('/transactions/{orderId}/status', function ($orderId) {
    $trx = Transaction::where('order_id', $orderId)->firstOrFail();

    return response()->json([
        'status' => $trx->status
    ]);
});

Route::get('/ping', function () {
    return response()->json(['pong' => true]);
});

