<?php

namespace App\Http\Controllers\Web\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function categoryindex(Request $request)
    {
        $categorys = category::get();
        return view('admin.masterdata.category.categoryindex', compact('categorys'));
    }
    public function categorycreate(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'thumbnail' => 'required',
        ]);

        $thumbnail = $request->file('thumbnail');
        $slug = Str::slug($request->category_name) . "-" . Str::random(10);
        $thumbnailUrl = $thumbnail->storeAs("Category", "{$slug}.{$thumbnail->extension()}");

        category::create([
            'category_name' => $request->category_name,
            'thumbnail' => $thumbnailUrl,
            'slug' => $slug,
        ]);
        return back();
    }

    public function categoryupdate(Request $request, category $category)
    {
        $thumbnail = $request->file('thumbnail');
        if ($thumbnail) {
            Storage::delete($category->thumbnail);
            $thumbnailUrl = $thumbnail->storeAs("Category", "{$category->slug}.{$thumbnail->extension()}");
        } else {
            $thumbnailUrl = $category->thumbnail;
        }

        $category->update([
            'category_name' => $request->category_name,
            'thumbnail' => $thumbnailUrl,
        ]);

        return back();
    }

    public function categorydelete(category $category)
    {
        Storage::delete($category->thumbnail);
        $category->delete();

        return back();
    }
}
