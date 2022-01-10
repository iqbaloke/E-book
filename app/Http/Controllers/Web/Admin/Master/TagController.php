<?php

namespace App\Http\Controllers\Web\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function tagindex()
    {
        $tags = tag::all();
        $categorys = category::get();
        return view('admin.masterdata.tag.tagindex', compact('tags','categorys'));
    }


    public function tagcreate(Request $request)
    {
        $request->validate([
            'tag_name' => 'required',
            'category' => 'required'
        ]);

        tag::create([
            'tag_name' => $request->tag_name,
            'category_id' => $request->category,
            'slug' => Str::slug($request->tag_name) . "-" . Str::random(10),
        ]);
        return back();
    }


    public function tagupdate(Request $request, tag $tag)
    {
        $request->validate([
            'tag_name' => 'required',
            'category' => 'required'
        ]);


        $tag->update([
            'tag_name' => $request->tag_name,
            'category_id' => $request->category,
        ]);

        return back();
    }


    public function tagdelete(tag $tag)
    {
        $tag->delete();

        return back();
    }
}
