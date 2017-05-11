<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class AdminController extends Controller
{
    public function admin(){
        if(session("admin")==0){
            return redirect()->back();
        }
        $posts=Post::orderBy("id","desc")->paginate(5);
        return view("admin.home",["posts"=>$posts]);
    }
}
