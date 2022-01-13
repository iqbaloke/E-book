<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\CollectionBooktResource;
use App\Http\Resources\Book\SingleBooktResource;
use App\Models\book;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function allbook()
    {
        $book = book::get();
        return CollectionBooktResource::collection($book);
    }

    public function singlebook(book $book)
    {
        return new SingleBooktResource($book);
    }
    public function bookauthormost()
    {
        $authors = User::withCount('order')
            ->orderBy('order_count', 'desc')
            ->paginate(10);

        return $authors;
    }
    public function bookrecomendation()
    {
        $bookrecomendations = book::withCount('order')
            ->orderBy('order_count', 'desc')
            ->paginate(10);
        return CollectionBooktResource::collection($bookrecomendations);
    }
}
