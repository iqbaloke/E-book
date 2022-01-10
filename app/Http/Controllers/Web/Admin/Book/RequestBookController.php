<?php

namespace App\Http\Controllers\Web\Admin\Book;

use App\Http\Controllers\Controller;
use App\Models\book;
use Illuminate\Http\Request;

class RequestBookController extends Controller
{
    public function requestbook()
    {
        $requestbook = book::where('approved', 0)->get();
        return view('admin.book.requestbook', compact('requestbook'));
    }
    public function publishbookrequest(Request $request, book $book)
    {
        $book->update([
            'approved' => 1,
        ]);
        return back();
    }
}
