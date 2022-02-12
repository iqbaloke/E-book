<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\cart;
use App\Models\income;
use App\Models\order;
use App\Models\order_notification;
use App\Models\purchased;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkoutview(book $book)
    {
        return view('landing.checkout.checkout', compact('book'));
    }

    public function checkoutcreate(book $book, cart $cart)
    {
        order::create([
            'order_key' => 'order' . '-' . now(),
            'book_id' => $book->id,
            'user_id' => $book->user_id,
            'user_order' => auth()->user()->id,
            'price' => $book->price,
            'status' => 1,
            'expirec' => 'expired',
            'payment' => 'payment',
        ]);

        $cart->delete();

        purchased::create([
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

        $orderNotification = order_notification::create([
            'user_id' => $book->user_id,
            'user_order' => auth()->user()->id,
            'book_id' => $book->id,
            'read' => 0,
        ]);
        return back();
    }
}
