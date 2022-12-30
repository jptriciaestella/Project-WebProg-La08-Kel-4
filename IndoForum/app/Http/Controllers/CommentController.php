<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    //
    public function editCommentPage($id){
        $id = DB::table('comments')
        ->where('id','=', $id)
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->select('*','comments.id as comment_id', 'users.id as user_id')
        ->first();
        return view('Auth.editComment', compact('id'));
    }

    public function editComment(Request $request){
        return redirect()->route('editCommentPage', ['id' => Auth::user()->id])->with('success','Comment berhasil diubah!');
    }

    public function delete($commentId){
        DB::table('comments')->where('id','=',$commentId)->delete();
        return redirect('/home')->with('success','comment has been deleted!');
    }
}
