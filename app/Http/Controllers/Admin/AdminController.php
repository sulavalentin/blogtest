<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AdminController extends Controller
{
    public function admin(){
        if(session("admin")==0){
            return redirect()->back();
        }
        return view("admin.home");
    }
}
