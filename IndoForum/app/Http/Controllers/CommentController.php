<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    // - Create comment: push comment ke db
    public function insertComment(Request $req){

        $comment = new Comment();
        $comment->comment = $req->comment;
        $comment->save();

        return redirect()->back()->with('sukses', 'Comment baru berhasil dibuat');
    }

    // - Show edit
    
}
