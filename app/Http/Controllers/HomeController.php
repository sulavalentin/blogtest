<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class HomeController extends Controller
{
    public function home()
    {
        $posts=Post::orderBy("id","desc")->paginate(5);
        return view("welcome",["posts"=>$posts]);
    }
    public function post($id)
    {
        /*select post*/
        $post=Post::where("id","=",$id)->first();
        /*select similar posts*/
        $similar=Post::where("id","<>",$id)->inRandomOrder()->take(6)->get();
        /*get comments with user name*/
        $comments=Comment::select('comments.*','users.name')
                ->where('comments.post_id','=',$id)
                ->where('comments.hidden','=',1)
                ->Join('users','users.id','=','comments.user_id')
                ->orderBy("id","desc")
                ->get();
        /*return*/
        return view("post",["post"=>$post,
                            "similar"=>$similar,
                            "comments"=>$comments]);
    }
    public function addcomment(Request $request){
        /*get data from ajax*/
        $comment_text=$request->comment;
        $id=$request->id;
        /*save comment*/
        $comment=new Comment;
        $comment->user_id=session('id');
        $comment->post_id=$id;
        $comment->comment=$comment_text;
        $comment->save();
        /*return this data*/
        return response()->json($comment);
    }
}
