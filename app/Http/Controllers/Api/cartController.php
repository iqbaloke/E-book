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

    public function addcart(book $book)
    {
        $chek = auth()->user()->cart()->where('book_id', $book->id)->first();
        if ($chek) {
            return response()->json([
                "message" => "already in the cart",
            ]);
        } else {
            Auth::user()->cart()->create([
                'book_id' => $book->id,
                'price' => $book->price,
            ]);
            return response()->json([
                "message" => "success, add to cart $book->title",
                "book" => new SingleBooktResource($book),
            ]);
        }
    }

    public function deletecart(cart $cart)
    {
        $cart->delete();
        return response()->json([
            "message" => "success delete cart",
        ]);
    }
}
