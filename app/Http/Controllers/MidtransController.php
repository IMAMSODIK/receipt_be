<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public function handle(Request $request)
    {
        $serverKey = config('midtrans.server_key');

        $signature = hash(
            'sha512',
            $request->order_id .
            $request->status_code .
            $request->gross_amount .
            $serverKey
        );

        if ($signature !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $trx = Transaction::where('order_id', $request->order_id)->first();
        if (!$trx) return response()->json(['message' => 'Not found'], 404);

        if ($request->transaction_status === 'settlement') {
            $trx->update([
                'status' => 'paid',
                'paid_at' => now(),
                'payment_type' => $request->payment_type,
                'payload' => $request->all()
            ]);
        }

        if (in_array($request->transaction_status, ['expire', 'cancel'])) {
            $trx->update(['status' => 'failed']);
        }

        return response()->json(['message' => 'OK']);
    }
}

