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
        $category = category::get();
        return CategoryResource::collection($category);
    }

    public function singlecategory(category $category)
    {
        return new SingleCategoryResource($category);
    }
    public function categorytag(category $category, tag $tag)
    {
        $book = book::where('tag_id', $tag->id)->get();
        return response()->json([
            'category_name' => $category->category_name,
            'tag' => $tag->tag_name,
            'book_count_in_tag' => $book->count(),
            'book' => CollectionBooktResource::collection($book),
        ]);
    }
}
