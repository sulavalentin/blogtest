<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    public function newpost(){
        return view("admin.newpost.samples.newpost");
    }
    public function addpost(Request $request){
        $post=new Post;
        $post->title=$request->title;
        $post->content=$request->content;
        $post->save();
    }
    public function getedit($id){
        $post=Post::where("id","=",$id)->first();
        return view("admin.newpost.samples.editpost",["post"=>$post]);
    }
    public function postedit(Request $request){
        $post=Post::where("id","=",$request->id)->first();
        $post->title=$request->title;
        $post->content=$request->content;
        $post->save();
    }
    public function getdelete($id){
        $post=Post::where("id","=",$id)->first();
        return view("admin.delete",["post"=>$post]);
    }
    public function postdelete($id){
        Post::where("id","=",$id)->delete();
        return redirect("/admin");
    }
}
