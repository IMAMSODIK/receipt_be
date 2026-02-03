<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Box;

class TransactionController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Transaksi',
            'data' => Box::all(),
        ];

        return view('transaksi.index', $data);
    }
}
