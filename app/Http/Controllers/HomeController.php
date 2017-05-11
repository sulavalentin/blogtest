<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    public function home()
    {
        $posts=Post::orderBy("id","desc")->paginate(5);
        return view("welcome",["posts"=>$posts]);
    }
    public function post($id)
    {
        $post=Post::where("id","=",$id)->first();
        $similar=Post::where("id","<>",$id)->inRandomOrder()->take(6)->get();
        return view("post",["post"=>$post,
                            "similar"=>$similar]);
    }
}
