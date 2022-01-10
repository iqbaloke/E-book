<?php

namespace App\Http\Controllers\Web\Admin\Book;

use App\Http\Controllers\Controller;
use App\Models\book;

class BookApprovedController extends Controller
{
    public function approvedbook()
    {
        $requestbook = book::where('approved', 1)->get();
        return view('admin.book.approvedbook', compact('requestbook'));
    }
    public function approvedbookrequest(book $book)
    {
        $book->update([
            'approved' => 0,
        ]);
        return back();
    }
}
