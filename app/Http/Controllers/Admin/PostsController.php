<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function newpost(){
        if(session("admin")==0){
            return redirect()->back();
        }
        return view("admin.newpost.samples.newpost");
    }
    public function addpost(){
        if(session("admin")==0){
            return redirect()->back();
        }
        DB::table("");
    }
}
