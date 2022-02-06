<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\CollectionBooktResource;
use App\Http\Resources\Book\SingleBooktResource;
use App\Models\book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function allbook()
    {
        $book = book::where('publish', 1)
            ->where('approved', 1)
            ->withCount('order')->get();
        return response()->json([
            'allbook' => CollectionBooktResource::collection($book),
        ]);
    }
    public function allbookpayment()
    {
        $book = book::where('publish', 1)
            ->where('approved', 1)
            ->where('payment', 1)
            ->withCount('order')->get();
        return response()->json([
            'allbook' => CollectionBooktResource::collection($book),
        ]);
    }

    public function allbookfree()
    {
        $book = book::where('publish', 1)
            ->where('approved', 1)
            ->where('payment', 0)
            ->withCount('order')->get();
        return response()->json([
            'allbook' => CollectionBooktResource::collection($book),
        ]);
    }

    public function singlebook(book $book)
    {
        return new SingleBooktResource($book);
    }

    public function bookauthormost()

    {
        $authors = User::withCount('order')->get();
        return response()->json([
            'authors' => $authors
        ]);
    }

    public function bookrecomendation()
    {
        $bookrecomendations = book::where('publish', 1)
            ->where('approved', 1)
            ->withCount('order')
            ->paginate(10);
        return response()->json([
            "recomendation" => CollectionBooktResource::collection($bookrecomendations),
        ]);
    }

    public function mybook()
    {
        $mybook = Auth::user()->book()->withCount('order')->get();
        return response()->json([
            'mybook' => CollectionBooktResource::collection($mybook),
        ]);
    }

    public function createbook(Request $request)
    {
        if (auth()->user()->hasRole("admin|super admin|creator")) {
            $request->validate([
                'publish' => 'required',
                'category_id' => 'required',
                'tag_id' => 'required',
                'title' => 'required',
                'price' => 'required',
                'thumbnail' => 'required',
                'year' => 'required',
                'page' => 'required',
                'file_id' => 'required',
                'description' => 'required',
                'book_file' => 'required'
            ]);

            $thumbnail = $request->file('thumbnail');
            $randomImage = Str::random(10);
            $slugImage = Str::slug($request->title);
            $titleImage = $request->title;
            $thumbnailUrl = $thumbnail->storeAs("Book/Images", "{$titleImage}.{$slugImage}.{$randomImage}.{$thumbnail->extension()}");

            $book_file = $request->file('book_file');
            $book_fileUrl = $book_file->storeAs("Book/file", "{$titleImage}.{$slugImage}.{$randomImage}.{$book_file->extension()}");

            $book = Auth::user()->book()->create([
                'book_key' => Str::random(4) . Str::random(4) . Str::random(4),
                'book_file' => $book_fileUrl,
                'publish' => $request->publish ? true : false,
                'category_id' => $request->category_id,
                'tag_id' => $request->tag_id,
                'title' => $request->title,
                'slug' => Str::slug($request->title) . Str::random(10),
                'price' => $request->price,
                'thumbnail' => $thumbnailUrl,
                'year' => $request->year,
                'page' => $request->page,
                'file_id' => $request->file_id,
                'description' => $request->description,
            ]);

            return response()->json([
                "message" => "success create ne book $book->title",
                "user" => auth()->user()->name,
                "book" => $book,
            ]);
        } else {
            return response()->json([
                "message" => "you have creator first",
            ]);
        }
    }

    public function bookupdate(Request $request, book $book)
    {
        $this->authorize('editbook', $book);
        if (auth()->user()->hasRole("admin|super admin|creator")) {

            $thumbnail = $request->file('thumbnail');
            $randomImage = Str::random(10);
            $slugImage = $book->slug;
            $titleImage = $request->title;

            $book_file = $request->file('book_file');

            if ($thumbnail) {
                Storage::delete($book->thumbnail);
                $thumbnailUrl = $thumbnail->storeAs("Book/Images", "{$titleImage}.{$slugImage}.{$randomImage}.{$thumbnail->extension()}");
            } else {
                $thumbnailUrl = $book->thumbnail;
            }
            if ($book_file) {
                Storage::delete($book->book_file);
                $book_fileUrl = $book_file->storeAs("Book/file", "{$titleImage}.{$slugImage}.{$randomImage}.{$book_file->extension()}");
            } else {
                $book_fileUrl = $book->book_file;
            }

            $book->update([
                'book_key' => Str::random(4) . Str::random(4) . Str::random(4),
                'book_file' => $book_fileUrl,
                'publish' => $request->publish ? true : false,
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id,
                'tag_id' => $request->tag_id,
                'title' => $request->title,
                'price' => $request->price,
                'thumbnail' => $thumbnailUrl,
                'year' => $request->year,
                'page' => $request->page,
                'file_id' => $request->file_id,
                'description' => $request->description,
            ]);

            return response()->json([
                "message" => "success update book",
                "book" => new CollectionBooktResource($book),
            ]);
        } else {
            return response()->json([
                "message" => "what are tou doing",
            ]);
        }
    }

    public function bookdelete(book $book)
    {
        $this->authorize('deletebook', $book);
        $book->delete();
        return response()->json([
            "message" => "success delete book",
        ]);
    }
}
