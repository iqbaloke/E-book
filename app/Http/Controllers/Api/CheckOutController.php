<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\cart;
use App\Models\income;
use App\Models\order;
use App\Models\order_notification;
use App\Models\purchased;

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
        $orderNotification = order_notification::create([
            'user_id' => $book->user_id,
            'order_user' => auth()->user()->id,
            'book_id' => $book->id,
            // 'read' => 0,
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
    public function checkoutnotcart(book $book)
    {

        $chekbook = auth()->user()->purchased()->where('book_id', $book->id)->first();
        $checkbookauthor = book::where('user_id', auth()->id())->first();

        if ($checkbookauthor) {
            return response()->json([
                "messsage" => "this is your book",
            ]);
        } else {
            if ($chekbook) {
                return response()->json([
                    "messsage" => "already",
                ]);
            } else {
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
                $orderNotification = order_notification::create([
                    'user_id' => $book->user_id,
                    'order_user' => auth()->user()->id,
                    'book_id' => $book->id,
                    // 'read' => 0,
                ]);
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
    }
}
