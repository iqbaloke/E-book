<?php

namespace App\Http\Controllers\Web\Landing;

use App\Http\Controllers\Controller;
use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request, book $book)
    {
        $request->validate([
            'description' => 'required',
        ]);

        Auth::user()->comment()->create([
            'book_id' => $book->id,
            'description' => $request->description,
        ]);
        return back();
    }
}
