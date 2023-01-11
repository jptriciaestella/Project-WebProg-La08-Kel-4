<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function createPost(){
        $post = DB::table('users')
                ->join('posts', 'users.id', '=', 'posts.user_id')
                ->join('post_category', 'posts.post_id', '=', 'post_category.post_id')
                ->join('categories', 'post_category.category_id', '=', 'categories.category_id')
                ->select('*','posts.id as post_id', 'users.id as user_id', 'categories.id as categories_id');

        $kategori = DB::table('categories')->get();
        return view('postInsert', compact('post','kategori'));
    }

    public function insert(Request $request, Post $post){

        $validateData = $request->validate([
            'title' => 'min:5',
            'content' => 'min:5',
            'image' => 'image'
        ]);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        $validateData ['user_id'] = auth()->user()->id;

        $post = Post::create($validateData);

        $post->category()->attach($request->category);

        // foreach ($request->isian as $key) {

        //     // if (isset(isian[$key])) {
        //         $insert = [
        //             'post_id' => 1,
        //             'category_id' => $request->isian[$key]
        //         ];

        //         DB::table('post_category')->insert($insert);
        //     // }
        //     // DB::table('post_category')->insert($insert);
        // };

        return redirect("/")->with('sukses', 'Post baru berhasil dibuat');
    }

    public function showDetailPost($postId){
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

        return view('postDetail', compact('post', 'comments'));

    }

    public function edit($postId){
        $post = DB::table('posts')
                ->where('posts.id','=', $postId)
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->select('*','posts.id as post_id', 'users.id as user_id')
                ->first();
        return view('postUpdate',compact('post'));
    }

    public function update(Request $request, $postId){

        $validate = [
            'title' => ['min:5'],
            'content' => ['min:5']
        ];

        $validator = Validator::make($request->all(), $validate);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        DB::table('posts')-> where('id', '=', $postId) ->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        $request->session()->flash('sukses', "Edit Post Berhasil");

        return redirect("/post/$postId");
    }

    public function delete(Post $post, $postId)
    {
        //DELETE PRODUCT
        $post = DB::table('posts')
                ->where('posts.id','=', $postId)
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->select('*','posts.id as post_id', 'users.id as user_id')
                ->first();

        Post::destroy($post->post_id);
        return redirect('/')->with('sukses', 'Post berhasil di delete');
    }
}
