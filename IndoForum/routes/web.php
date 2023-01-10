<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

#Auth Pages
Route::get('/sign-in', [UserController::class, 'signinPage'])->name('sign-in');
Route::post('/sign-in', [UserController::class, 'signin']);
Route::get('/sign-up', [UserController::class, 'signupPage']);
Route::post('/sign-up', [UserController::class, 'signup']);
Route::get('/sign-out', [UserController::class, 'signout']);

#Public Pages: View All Post (Home), View Detail Post
Route::get('/', [HomeController::class, 'showAllPosts']);
Route::get('/category/{categoryId}', [HomeController::class, 'showAllPostsCat']);
Route::get('/post/{postId}', [PostController::class, 'showDetailPost']);

#User Pages (Member & Admin) -> Create Edit Delete Post, Create Edit Delete Comment, View Profile
Route::middleware('auth')->group(function(){
    #View Profile
    Route::get('/profile/{username}', [UserController::class, 'profilePage'])->name('profilePage');
    Route::get('/createPost', [PostController::class, 'createPost']);
    Route::post('/insertData', [PostController::class, 'insert']);
    Route::get('/updatePost/{postId}',[PostController::class, 'edit']);
    Route::put('/updateData/{postId}',[PostController::class, 'update']);
    Route::delete('/deleteData/{postId}', [PostController::class, 'delete']);
    Route::post('/insertComment/{postId}', [CommentController::class, 'insertComment']);

});

#Member Pages -> Edit Password
Route::middleware('member')->group(function(){
    #Show edit password page
    Route::get('/edit-password', [UserController::class, 'editPasswordPage']);
    #Edit password
    Route::post('/edit-password', [UserController::class, 'editPassword']);
});

#Admin Pages -> ??
Route::middleware('admin')->group(function(){

});
