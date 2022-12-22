<?php

namespace App\Http\Controllers;

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
            return redirect('/home');
        }

        return back()->withErrors('There is no credentials found in our database! Check your email or password.');
    }

    public function signout(){
        Auth::logout();
        return redirect('/');
    }

    public function signupPage(){
        return view('Auth.signup');
    }

    public function signup(Request $request){
        $rules = [
            'username' => 'required|between:5,20|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|between:5,20',
            'phoneNumber' => 'required|digits_between:10,13',
            'address' => 'required|min:5'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        DB::table('users')->insert([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone_number' => $request->phoneNumber,
            'address' => $request->address,
        ]);

        return redirect('/')->with('success', 'Your account has been successfully created! Please sign in to continue.');
    }

    public function profilePage($userId){
        // $user => ambil dari userId

        // show profile page
        // return view('profilePage', compact($user))

        /*
        blade view profile:
            @if ($userId == Auth::user()->id) -> berarti profile tersebut punya user
                @if(Auth::user()->role == 'Member') -> cuma member yg bisa edit pw, admin nggak
                    <tampilin tombol edit password>
                @endif
                <tampilin tombol logout>
            @endif
        */
    }

    public function editPasswordPage(){
        //show form edit password
    }

    public function editPassword(Request $request){
        //update password ke db
    }

}
