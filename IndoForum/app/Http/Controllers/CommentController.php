<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    // - Create comment: push comment ke db
    public function insertComment(Request $req, $postid){

        $validateData = $req->validate([
            'comment' => 'min:5'
        ]);

        $validateData ['post_id'] = $postid;

        $validateData ['user_id'] = auth()->user()->id;
        // $comment = new Comment();
        // $comment->comment = $req->comment;
        // $comment->save();

        Comment::create($validateData);

        return redirect()->back()->with('sukses', 'Comment baru berhasil dibuat');
    }

    // - Show edit
    public function edit($postId, $commentId){

        $post = DB::table('posts')
                ->where('posts.id','=', $postId)
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->select('*','posts.id as post_id', 'users.id as user_id')
                ->first();

        $comments = DB::table(('comments'))
                ->join('users', 'users.id', '=', 'comments.user_id')
                ->select('*','comments.id as comment_id', 'users.id as user_id')
                ->where('post_id','=', $postId)
                ->latest('comments.created_at')->paginate(10);

        $comment = DB::table('comments')
                ->where('comments.id','=', $commentId)
                ->join('users', 'users.id', '=', 'comments.user_id')
                ->select('*','comments.id as comment_id', 'users.id as user_id')
                ->first();

        return view('Auth.editComment', compact('post', 'comments', 'comment'));
    }

    public function update(Request $request, $commentId){

        $validate = [
            'comment' => 'min:5'
        ];

        $validator = Validator::make($request->all(), $validate);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        DB::table('comments')->where('id','=',$commentId)->delete([
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('sukses', 'Comment berhasil diupdate');
    }

    public function delete($commentId){

        DB::table('comments')->where('id','=',$commentId)->delete();

        return redirect()->back()->with('sukses', 'Comment berhasil didelete');
    }

}
