<?php

namespace App\Http\Controllers\Api\Dashboard\Income;

use App\Http\Controllers\Controller;
use App\Models\income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
    public function widraw(Request $request)
    {
        $income = Auth::user()->income()->get();
        foreach ($income as $total) {
            $ok = $total->residual_income;
        }

        $update = income::where('user_id', auth()->user()->id)->first();
        if ($request->nominal == 0) {
            return response()->json([
                'message' => "your money is not enough",
            ]);
        } else {
            if ($request->nominal < $ok) {
                $widraw = Auth::user()->widraw()->create([
                    'widraw_key' => 'widraw_key' . '-' . Str::random(10),
                    'nominal' => $request->nominal,
                    'payment' => $request->payment,
                    'payment_name' => $request->payment_name,
                    'status' => 2,
                ]);

                $update->update([
                    'total_income' => $update->total_income,
                    'residual_income' => $update->residual_income - $request->nominal,
                    'expenditure' => $update->expenditure + $request->nominal,
                ]);
                return response()->json([
                    'message' => "success windraw",
                    "widraw" => $widraw,
                ]);
            } else {
                return response()->json([
                    'message' => "your money is not enough",
                ]);
            }
        }
    }
}
