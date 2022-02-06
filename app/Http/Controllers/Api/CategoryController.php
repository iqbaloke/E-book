<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\CollectionBooktResource;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Category\SingleCategoryResource;
use App\Models\book;
use App\Models\category;
use App\Models\tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allcaregory()
    {
        $category = category::withCount('book')->get();
        // return $category;
        return response()->json([
            "category" => $category,
        ]);
    }

    public function alltag()
    {
        $tag = tag::get();
        // return $tag;
        return response()->json([
            "tag" => $tag,
        ]);
    }
    public function selecttag(category $category)
    {
        // return "hello";
        $test = tag::where('category_id', $category->id)->get();
        return $test;
    }

    public function singlecategory(category $category)
    {
        $category_single = book::where('category_id', $category->id)
            ->where('publish', 1)
            ->where('approved', 1)
            ->get();
        return response()->json([
            'detailcategory' => CollectionBooktResource::collection($category_single),
        ]);
    }
    public function categorytag(category $category)
    {
        $category_tags = $category->tags()->get();
        return response()->json([
            'category_tag' => $category_tags,
        ]);
    }
    public function booktag(category $category, tag $tag)
    {
        $book = book::where('tag_id', $tag->id)
            ->where('publish', 1)
            ->where('approved', 1)
            ->get();
        return response()->json([
            // 'category_name' => $category->category_name,
            // 'tag' => $tag->tag_name,
            // 'book_count_in_tag' => $book->count(),
            'book' => CollectionBooktResource::collection($book),
        ]);
    }
}
