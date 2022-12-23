<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function showDetailPost($postId){
        $post = DB::table('posts')
                ->where('posts.id','=', $postId)
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->first();

        $comments = DB::table(('comments'))
                    ->join('users', 'users.id', '=', 'comments.user_id')
                    ->where('post_id','=', $postId)->paginate(10);

        return view('postDetail', compact('post', 'comments'));

    }
}
