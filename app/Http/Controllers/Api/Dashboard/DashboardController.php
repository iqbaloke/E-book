<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->hasRole("admin|super admin|creator")) {
            $orders = auth()->user()->order->count() ?? "0";
            $income_total = auth()->user()->income->total_income ?? "0";
            $residual_income = auth()->user()->income->residual_income ?? "0";
            $expenditure = auth()->user()->income->expenditure ?? "0";

            return response()->json([
                'user_role' => auth()->user()->roles,
                'sale' => $orders,
                'income_total' => $income_total,
                'residual_income' => $residual_income,
                'expenditure' => $expenditure,
            ]);
        } else {
            return "Become a Creators";
        }
    }
}
