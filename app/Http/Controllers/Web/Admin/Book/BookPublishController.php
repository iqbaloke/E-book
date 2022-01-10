<?php

namespace App\Http\Controllers\Web\Admin\Book;

use App\Http\Controllers\Controller;
use App\Models\book;
use Illuminate\Http\Request;

class BookPublishController extends Controller
{
    public function publishbyuser()
    {
        $requestbook = book::where('publish', 1)->get();
        return view('admin.book.booknotpublishbyuser', compact('requestbook'));
    }
}
