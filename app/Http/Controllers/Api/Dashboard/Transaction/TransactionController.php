<?php

namespace App\Http\Controllers\Api\Dashboard\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Resources\Transaction\TransactionResource;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function transaction()
    {
        $transactions = order::where('user_order', Auth::user()->id)->get();
        return TransactionResource::collection($transactions);
    }
}
