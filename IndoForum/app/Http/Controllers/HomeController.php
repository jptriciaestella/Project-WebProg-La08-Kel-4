<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function showAllPosts(){
        $posts = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->latest('posts.created_at')->paginate(10);

        $categories = DB::table('categories')->get();

        $active = 'Semua';

        return view('home', compact('posts', 'categories', 'active'));
    }

    public function showAllPostsCat($categoryId){
        $posts = Post::with('category')
        ->whereHas('category', function($query) use ($categoryId){
            $query->where('category_id', $categoryId);
        })->orderBy('posts.created_at','desc')->paginate(10);

        $categories = DB::table('categories')->get();

        $active_name = DB::table('categories')
                ->where('id','=', $categoryId)
                ->select('name')->first();

        $active = $active_name->name;

        return view('home', compact('posts', 'categories', 'active'));

    }
}
