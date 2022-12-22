<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function signinPage(){
        return view('Auth.signin');
    }

    public function signin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'between:5,20'],
        ]);

        if($request->remember){
            Cookie::queue('remember-email', $request->email, 5);
            Cookie::queue('remember-password', $request->password, 5);
        }

        if(Auth::attempt($credentials, true)){
            Session::put('user-session', $credentials);
            return redirect('/');
        }

        return back()->withErrors('There is no credentials found in our database! Check your email or password.');
    }

    public function signupPage(){
        return view('Auth.signup');
    }

    public function signup(Request $request){
        $rules = [
            'username' => 'required|between:5,20|unique:users,username',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|between:5,20',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        DB::table('users')->insert([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/')->with('success', 'Your account has been successfully created! Please sign in to continue.');
    }

    public function signout(){
        Auth::logout();
        return redirect('/');
    }

    public function profilePage($username){
        $user = DB::table('users')
        ->where('username','=', $username)
        ->first();

        // $posts = Post::where('user_id', '=', $user->id)->paginate(8);

        $posts = DB::table('posts')
        ->where('user_id','=', $user->id)
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->paginate(8);

        return view('Member.profilePage', compact('user','posts'));
    }

    public function editPasswordPage(){
        return view('Member.editPassword');
    }

    public function editPassword(Request $request){
        //update password ke db, return redirect ke profile dia dengan alert success


        return redirect()->route('profilePage', ['username' => Auth::user()->username])->with('success','Password berhasil diubah!');
    }

}
