<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
use Mail;
use Crypt;
use Session;
use Hash;

class RegisterController extends Controller
{
    /*Login*/
    public function getlogin(){
        return view("login");
    }
    public function postlogin(Request $request){
        $user=User::where("email",'=',$request->email)
                ->where('confirmed','=',1)
                ->first();
        if(!empty($user) && Hash::check($request->password, $user->password))
        {
            Session::put('name',$user->name);
            Session::put('id',$user->id);
            Session::put('admin',$user->admin);
            return redirect('/');
        }else{
            Session::flash('errorlogin', "Login sau parola gresita");
            return redirect()->back();
        }
    }
    /*Register*/
    public function getregister(){
        return view("register");
    }
    public function postregister(Request $request){
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        $email=$request->email;
        $token=str_random(32);
        /*Create new user*/
        $user=new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->confirmation_code = $token;
        $user->save();
        /*Send email*/
        Mail::send('email.verify', ['email' => Crypt::encrypt($email) , 'token' => $token], function ($message) use ($email) {
                $message->to($email)->subject('Confirmation code');
            });
        /*When success then send message */
        Session::flash('verify', "Verify you email");
        return redirect()->back();
    }
    public function verify($email, $token){
        $email=Crypt::decrypt($email);
        $user=User::where('email','=',$email)
                ->where('confirmation_code','=',$token)
                ->first();
        if(! $user){
            return view("email.verified",["error"=>"Invalid code"]);
        }
        /*If is first user , then he is admin*/
        $firstuser=User::where("confirmed","=",1)->count("id");
        if($firstuser==0){
            $user->admin=1;
        }
        $user->confirmed=1;
        $user->confirmation_code=null;
        $user->save();
        return view("email.verified",["success"=>"Email confirmed"]);
    }
    public function logout(){
        session()->forget('name');
        session()->forget('id');
        session()->forget('admin');
        return redirect('/');
    }
}
