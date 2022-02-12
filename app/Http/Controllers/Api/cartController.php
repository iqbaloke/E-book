<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\SingleBooktResource;
use App\Http\Resources\Cart\CartResource;
use App\Http\Resources\OrderTransactionResource;
use App\Models\book;
use App\Models\cart;
use App\Models\order_notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    public function getcart()
    {
        $cart = Auth::user()->cart()->get();
        return CartResource::collection($cart);
    }

    public function checkcart()
    {
        $check_cart = Auth::user()->cart()->count();
        $check_orderNotification = order_notification::where('order_user', auth()->id())->where('read', 0)
        ->orWhere('user_id', auth()->id())->where('read_author', 0)
        ->get();
        return response()->json([
            'user' => Auth::user()->name,
            'cart_count' => $check_cart,
            'orderNotification' => $check_orderNotification->count(),
            // 'orderNotification1' => $check_orderNotification,
        ]);
    }

    public function addcart(book $book)
    {
        $check_publish = auth()->user()->purchased()->where('book_id', $book->id)->first();
        $check = auth()->user()->cart()->where('book_id', $book->id)->first();
        if ($check_publish) {
            return response()->json([
                "message" => "already",
            ]);
        } else {
            if ($check) {
                return response()->json([
                    "message" => "you have buy in book",
                ]);
            } else {
                Auth::user()->cart()->create([
                    'book_id' => $book->id,
                    'price' => $book->price,
                ]);
                return response()->json([
                    "message" => "success",
                    "book" => new SingleBooktResource($book),
                ]);
            }
        }
    }

    public function deletecart(cart $cart)
    {
        $cart->delete();
        return response()->json([
            "message" => "success",
        ]);
    }
}
