<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Comment\CommentResource;
use App\Models\book;
use App\Models\comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function comment(book $book){
        $comment = comment::where('book_id', $book->id)->get();
        return CommentResource::collection($comment);

    }
}
