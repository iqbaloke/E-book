<?php

namespace App\Http\Controllers\Web\Landing;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\category;
use App\Models\income;
use App\Models\tag;
use App\Models\User;

class LandingController extends Controller
{
    public function landing()
    {
        $category = category::get();
        $books = book::where('publish', 1)->paginate(40);
        $bookrecomendations = book::withCount('order')
            ->orderBy('order_count', 'desc')
            ->paginate(10);

        $authors = User::withCount('order')
            ->orderBy('order_count', 'desc')
            ->paginate(10);
        return view('landing.welcome', compact('books', 'bookrecomendations', 'authors', 'category'));
    }

    public function landingdetail(book $book)
    {
        return view('landing.landingdetail', [
            'title' => $book->title,
            'book' => $book,
        ]);
    }

    public function categorylanding()
    {
        return view('landing.category.category', [
            'categorys' => category::get(),
        ]);
    }
    public function categorydetail(category $category)
    {
        $categorytags = tag::where('category_id', $category->id)->get();
        $title = $category->category_name;
        $books = book::where('category_id', $category->id)->get();
        return view('landing.category.categorydetail', compact('categorytags', 'title', 'books', 'category'));
    }

    public function categorytagdetail(category $category, tag $tag)
    {
        return view('landing.category.categorytag', [
            'category' => "$category->category_name",
            'tag' => "$tag->tag_name",
            'tagbook' => book::where('tag_id', $tag->id)->get(),
        ]);
    }
}
