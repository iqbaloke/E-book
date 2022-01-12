<?php

namespace App\Http\Controllers\Web\Creator;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function transaction()
    {
        $transactions = order::where('user_order', Auth::user()->id)->get();
        return view('creators.transaction.transaction', compact('transactions'));
    }
    public function transactionadminsuccess()
    {
        $transactions = order::where('status', 1)->get();
        return view('admin.transaction.transactionsuccess',compact('transactions'));
    }
    public function transactionadminpending()
    {
        $transactions = order::where('status', 2)->get();
        return view('admin.transaction.transactionpending',compact('transactions'));
    }
    public function transactionadminfaild()
    {
        $transactions = order::where('status', 3)->get();
        return view('admin.transaction.transactionfaild',compact('transactions'));
    }
}
