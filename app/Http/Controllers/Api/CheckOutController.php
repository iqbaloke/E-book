<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\cart;
use App\Models\income;
use App\Models\order;
use App\Models\purchased;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function order(book $book, cart $cart)
    {
        $checkout = order::create([
            'order_key' => 'order' . '-' . now(),
            'book_id' => $book->id,
            'user_id' => $book->user_id,
            'user_order' => auth()->user()->id,
            'price' => $book->price,
            'status' => 1,
            'expirec' => 'expired',
            'payment' => 'payment',
        ]);
        $cartdelete = $cart->delete();
        $purchased = purchased::create([
            'user_id' => auth()->user()->id,
            'book_id' => $book->id,
        ]);
        $check = income::where('user_id', $book->user_id)->first();
        if ($check) {
            $check->update([
                'total_income' => $check->total_income + $book->price,
                'residual_income' => $check->residual_income + $book->price,
            ]);
        } else {
            income::create([
                'user_id' => $book->user_id,
                'total_income' => $book->price,
                'residual_income' => $book->price,
            ]);
        }
        return response()->json([
            'checkout' => $checkout,
            'purchased' => $purchased,
        ]);
    }
}
