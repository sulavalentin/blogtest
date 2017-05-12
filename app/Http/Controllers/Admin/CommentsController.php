<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentsController extends Controller
{
    public function getcomments(){
        $comments=Comment::select('comments.*','users.name','posts.title')
                ->leftJoin('users', 'users.id', '=', 'comments.user_id')
                ->leftJoin('posts', 'posts.id', '=', 'comments.post_id')
                ->orderby('comments.hidden')
                ->paginate(10);
        return view('admin.comments',["comments"=>$comments]);
    }
    public function acceptcomment($id){
        Comment::where('id','=',$id)->update(["hidden"=>1]);
        return redirect()->back();
    }
    public function refusecomment($id){
        Comment::where('id','=',$id)->update(["hidden"=>0]);
        return redirect()->back();
    }
    public function getdeletecomment($id){
        $comment=Comment::where('id','=',$id)->first();
        return view('admin.deletecomment',["comment"=>$comment]);
    }
    public function postdeletecomment($id){
        Comment::where('id','=',$id)->delete();
        return redirect('/admin/comments');
    }
}
