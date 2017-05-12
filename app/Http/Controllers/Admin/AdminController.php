<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class AdminController extends Controller
{
    public function admin(){
        $posts=Post::orderBy("id","desc")->paginate(5);
        return view("admin.home",["posts"=>$posts]);
    }
}
