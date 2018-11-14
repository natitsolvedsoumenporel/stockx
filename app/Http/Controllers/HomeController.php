<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PHPUnit\Framework\Constraint\Exception;
use Hash;
use Auth;
use Session;
use Validator;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['signup','login']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 1;exit;
        //return view('home');
    }
    
    public function login(){
        return view('Home.login');
    }
    
    public function signup(){
        return view('Home.signup');
    }
    
    public function afterloginfrontend(Request $request){
        
        $condition = ['email'=>$request->input('email') , 'password'=> ($request->input('password'))]; 
        
        $user = DB::table('users')->where($condition)->first();
        
        if(Auth::attempt($condition)){
            Session::flash('message', 'Successfully Logged In.');
            return redirect('/');
        }else{
            Session::flash('message', 'Invalid Email ID or Password');
            return redirect('/login');
        }
        
        
    }
    
    public function logout(){
        Auth::logout();
        Session::flash('message', 'Successfully Logged out.');
        return redirect('/');
    }
}
