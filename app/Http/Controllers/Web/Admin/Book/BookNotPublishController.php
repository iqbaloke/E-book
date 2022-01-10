<?php

namespace App\Http\Controllers\Web\Admin\Book;

use App\Http\Controllers\Controller;
use App\Models\book;
use Illuminate\Http\Request;

class BookNotPublishController extends Controller
{
    public function notpublishbyuser()
    {
        $requestbook = book::where('publish', 0)->get();
        return view('admin.book.approvedbook', compact('requestbook'));
    }
}
