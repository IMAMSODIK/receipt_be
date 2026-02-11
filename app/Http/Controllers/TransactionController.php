<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Box;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $totalPaid = Transaction::where('status', 'paid')->count();

        $paidThisMonth = Transaction::where('status', 'paid')
            ->whereMonth('paid_at', Carbon::now()->month)
            ->whereYear('paid_at', Carbon::now()->year)
            ->count();

        $paidToday = Transaction::where('status', 'paid')
            ->whereDate('paid_at', Carbon::today())
            ->count();

        $data = [
            'pageTitle' => 'Transaksi',
            'boxes' => Box::withSum(['transactions as total_amount' => function ($q) {
                $q->where('status', 'paid');
            }], 'amount')->get(),
            'totalPaid' => $totalPaid,
            'paidThisMonth' => $paidThisMonth,
            'paidToday' => $paidToday,
        ];

        return view('transaksi.index', $data);
    }

    public function detail(Request $r)
    {
        try {
            $boxId = $r->box_id;
            $transactions = Transaction::where('box_id', $boxId)
                ->where('status', 'paid')
                ->latest()
                ->get();

            $totalAll = Transaction::where('box_id', $boxId)
                ->where('status', 'paid')
                ->sum('amount');

            $totalMonth = Transaction::where('box_id', $boxId)
                ->where('status', 'paid')
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->sum('amount');

            $totalToday = Transaction::where('box_id', $boxId)
                ->where('status', 'paid')
                ->whereDate('created_at', today())
                ->sum('amount');

            $data = $transactions->map(function ($t) {
                return [
                    'order_id' => $t->order_id,
                    'amount' => $t->amount,
                    'status' => ucfirst($t->status),
                    'created_at' => $t->created_at->format('d M Y H:i')
                ];
            });

            return view('transaksi.detail', [
                'pageTitle' => 'Detail Transaksi',
                'transactions' => $data,
                'totalAll' => $totalAll,
                'totalMonth' => $totalMonth,
                'totalToday' => $totalToday,
            ]);
        } catch (\Exception $e) {

            return back()->with('error', 'Gagal mengambil data transaksi: ' . $e->getMessage());
        }
    }
}
