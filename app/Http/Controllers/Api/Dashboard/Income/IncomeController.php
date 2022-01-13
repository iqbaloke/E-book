<?php

namespace App\Http\Controllers\Api\Dashboard\Income;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function income()
    {
        $orders = auth()->user()->order->count() ?? "0";
        $income_total = auth()->user()->income->total_income ?? "0";
        $residual_income = auth()->user()->income->residual_income ?? "0";
        $expenditure = auth()->user()->income->expenditure ?? "0";

        return response([
            'orders' => $orders,
            'income_total' => $income_total,
            'residual_income' => $residual_income,
            'expenditure' => $expenditure,
            'widraw' => Auth::user()->widraw()->get(),
        ]);
    }
}
