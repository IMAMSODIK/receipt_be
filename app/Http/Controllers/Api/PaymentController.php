<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function snap(Request $request)
    {
        $user = $request->user();
        $box = $user->box;

        if (!$box) {
            return response()->json(['message' => 'Box not found'], 404);
        }

        $orderId = 'ORD-' . Str::uuid();

        $trx = Transaction::create([
            'id' => Str::uuid(),
            'order_id' => $orderId,
            'box_id' => $box->id,
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $request->amount,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return response()->json([
            'snap_token' => $snapToken,
            'order_id' => $orderId
        ]);
    }
}
