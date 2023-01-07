<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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

        return back()->withErrors('There are no matching credentials found in our database! Please check your email or password.');
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
    // public function profilePage(){
    //     $username=Auth::user()->username;
        $user = DB::table('users')
        ->where('username','=', $username)
        ->first();

        // $posts = Post::where('user_id', '=', $user->id)->paginate(8);

        $posts = DB::table('posts')
        ->where('user_id','=', $user->id)
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('*','posts.id as post_id')
        ->latest('posts.created_at')
        ->paginate(8);

        return view('Member.profilePage', compact('user','posts'));
    }

    public function editPasswordPage(){
        return view('Member.editPassword');
    }

    public function editPassword(Request $request){
        //update password ke db, return redirect ke profile dia dengan alert success



        // if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        //     return redirect()->back()->with("error","Your current password does not match with the password.");
        // }

        // if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        //     return redirect()->back()->with("error","New Password cannot be same as your current password.");
        // }

        // $credentials = $request->validate([
        //     'current-password' => 'required',
        //     'new-password' => 'required|string|min:8|confirmed',
        // ]);

        // DB::table('users')
        //     ->where('email', '=', Auth::user()->email)
        //     ->update(['new-password' => bcrypt($request->newPassword)]);

        // return redirect('/profile')->with('success', 'Your account now has a new updated password!');



        // if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        //     // The passwords matches
        //     return redirect()->back()->with("error","Your current password does not match with the password.");
        // }

        // if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        //     // Current password and new password same
        //     return redirect()->back()->with("error","New Password cannot be same as your current password.");
        // }

        // $validatedData = $request->validate([
        //     'current-password' => 'required',
        //     'new-password' => 'required|string|min:8|confirmed',
        // ]);

        // //Change Password
        // $user = Auth::user();
        // $user->password = bcrypt($request->get('new-password'));
        // $user->save();

        // return redirect()->back()->with("success","Password successfully changed!");




        // $credentials = $request->validate([
        //     'password' => ['required', 'between:5,20'],
        // ]);



        $rules = [
            'currentpassword' => 'required|between:5,20',
            'newpassword' => 'required|required_with:newpasswordconfirm|same:newpasswordconfirm',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        if(Hash::check($request->currentpassword, Auth::user()->password)){
            DB::table('users')
            ->where('email', '=', Auth::user()->email)
            ->update([
                'password' => bcrypt($request->newpassword)
            ]);
            return redirect('/profile')->with('success', 'Your account now has a new updated password!');
        }

        return back()->withErrors('Wrong Password!');
    }
}
