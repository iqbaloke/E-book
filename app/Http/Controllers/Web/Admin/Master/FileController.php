<?php

namespace App\Http\Controllers\Web\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\file;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function fileindex(Request $request)
    {
        $files = file::get();
        return view('admin.masterdata.file.fileindex', compact('files'));
    }
    public function filecreate(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $file_create = file::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name) . "-" . Str::random(10),
        ]);
        return back();
    }

    public function fileupdate(Request $request, file $file)
    {
        $request->validate([
            'name' => 'required',
        ]);


        $file->update([
            'name' => $request->name,
        ]);

       return back();
    }

    public function filedelete(file $file)
    {
        $file->delete();

       return back();
    }
}
