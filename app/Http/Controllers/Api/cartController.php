<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\SingleBooktResource;
use App\Http\Resources\Cart\CartResource;
use App\Models\book;
use App\Models\cart;
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
        return response()->json([
            'user' => Auth::user()->name,
            'cart_count' => $check_cart,
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
