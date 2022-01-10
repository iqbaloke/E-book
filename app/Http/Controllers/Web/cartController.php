<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    public function addtocart(book $book)
    {
        $chek = auth()->user()->cart()->where('book_id', $book->id)->first();
        if ($chek) {
            return back()->with("error", "$book->title already in the cart");
        } else {
            cart::create([
                'user_id' => Auth::user()->id,
                'book_id' => $book->id,
                'price' => $book->price,
            ]);
            return back()->with("success", "add to cart $book->title");
        }
    }
    public function favorite()
    {
        $carts = auth()->user()->cart;

        return view('creators.cart.cart', compact('carts'));
    }
    public function favoritedelete(cart $cart)
    {
        $cart->delete();
        return back()->with("success", "delete favorite");
    }
}
