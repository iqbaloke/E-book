<?php

namespace App\Http\Controllers\Api\Dashboard\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\CollectionBooktResource;
use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookCreatorController extends Controller
{
    public function bookcreator()
    {
        $book = Auth::user()->book()->get();

        return CollectionBooktResource::collection($book);
    }
    public function topbookcreator()
    {
        $booktopauthor = Auth::user()->book()->withCount('order')->latest()->paginate(5);
        return CollectionBooktResource::collection($booktopauthor);
    }
}
