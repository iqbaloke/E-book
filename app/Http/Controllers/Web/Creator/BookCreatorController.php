<?php

namespace App\Http\Controllers\Web\Creator;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\category;
use App\Models\file;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookCreatorController extends Controller
{
    public function bookcreator()
    {
        return view('creators.book.creatorbook', [
            'categorys' => category::get(),
            'tags' => tag::get(),
            'files' => file::get(),
            'books' => Auth::user()->book()->get(),
        ]);
    }

    public function ajaxtag(Request $request)
    {
        $res = tag::where('category_id', $request->id)->get();
        return response()->json($res);
    }

    public function createbookcreator(Request $request)
    {
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

        // dd($request->tag_id);

        $thumbnail = $request->file('thumbnail');
        $randomImage = Str::random(10);
        $slugImage = Str::slug($request->title);
        $titleImage = $request->title;
        $thumbnailUrl = $thumbnail->storeAs("Book/Images", "{$titleImage}.{$slugImage}.{$randomImage}.{$thumbnail->extension()}");

        $book_file = $request->file('book_file');
        $book_fileUrl = $book_file->storeAs("Book/file", "{$titleImage}.{$slugImage}.{$randomImage}.{$book_file->extension()}");

        Auth::user()->book()->create([
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
        return back();
    }

    public function detailbookcreator(book $book)
    {
        return view('creators.book.detailcreatorbook', [
            'books' => $book,
            'title' => $book->title,
            'categorys' => category::get(),
            'tags' => tag::get(),
            'files' => file::get(),
        ]);
    }

    public function updatebookcreator(Request $request, book $book)
    {

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
        return back();
    }

    public function deletebookcreator(book $book)
    {
        $book->delete();
        return back();
    }
}
