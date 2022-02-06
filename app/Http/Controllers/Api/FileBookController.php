<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\file;
use Illuminate\Http\Request;

class FileBookController extends Controller
{
    public function allfile()
    {
        $filebook = file::get();
        return response()->json([
            'filebook' => $filebook,
        ]);
    }
}
