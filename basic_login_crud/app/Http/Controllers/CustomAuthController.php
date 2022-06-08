<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userdata;

class CustomAuthController extends Controller
{
    //
    public function userlogin(){
        return view('auth.login');
    }
    public function registration(){
        return view('auth.register');
    }
    public function register_click(Request $request){
        $request->validate([
            'nm'=>'required',
            'em'=>'required|email|unique:userdata,email',
            'mob'=>'required|unique:userdata,mobile|max:12',
            'unm'=>'required|unique:userdata,username',
            'pw'=>'required|min:5|max:15',
            'cpw'=>'required|min:5|max:15',
        ]);

        if(($request->pw)==($request->cpw)){
            $user = new Userdata();
            $user->fullname = $request->nm;
            $user->email = $request->em;
            $user->mobile = $request->mob;
            $user->username = $request->unm;
            $user->password = $request->pw;
            $yes = $user->save();
            if($yes){
               return back()->with('success','You have successfully registered');
            }else{
                return back()->with('fail','Registration failed');
            }
        }else{
            return back()->with('fail','Passwords does not match');
        }

    }
    public function login_click(Request $request){
        $request->validate([
            'uname'=>'required',
            'passwd'=>'required|min:5|max:15',
        ]);
        $user = Userdata::where('username','=',$request->uname)->first();
        if($user){
            if(($user->password) == ($request->passwd)){
                $request->session()->put('loginID',$user->id);
                return redirect('userhome');
            }else{
                return back()->with('pfail','Incorrect password');
            }
        }else{
            return back()->with('no_user','Username not found');
        }
    }
    public function login_success(){
        $data = array();
        if(session()->has('loginID')){
            $data = Userdata::where('id','=',session('loginID'))->first();
        }
        return view('auth.userhome',compact('data'));
    }
    public function logout(){
        if(session()->has('loginID')){
            session()->pull('loginID');
        }
        return redirect('login');
    }
}
