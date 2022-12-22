<?php

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

#Welcome Page
Route::get('/', function () {
    return view('home');
});

#Auth Pages
Route::get('/sign-in', [UserController::class, 'signinPage'])->name('sign-in');
Route::post('/sign-in', [UserController::class, 'signin']);
Route::get('/sign-up', [UserController::class, 'signupPage']);
Route::post('/sign-up', [UserController::class, 'signup']);
Route::get('/sign-out', [UserController::class, 'signout']);

#Public Pages: View All Post (Home), View Detail Post


#User Pages (Member & Admin) -> Create Edit Delete Post, Create Edit Delete Comment, View Profile
Route::middleware('auth')->group(function(){
    #View Profile
    Route::get('/profile/{username}', [UserController::class, 'profilePage'])->name('profilePage');
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
