<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function getusers(){
        /*Select all users except this user (me)*/
        $users=User::where('id','<>',session('id'))->paginate(10);
        return view('admin.users',['users'=>$users]);
    }
    public function upadmin($id){
        /*create user admin*/
        User::where('id','=',$id)->update(["admin"=>1]);
        return redirect()->back();
    }
    public function downadmin($id){
        /*create user simple user*/
        User::where('id','=',$id)->update(["admin"=>0]);
        return redirect()->back();
    }
}
