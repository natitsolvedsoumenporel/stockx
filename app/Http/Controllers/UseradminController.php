<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;
use Hash;
use Auth;
use Session;
use Validator;
use PHPUnit\Framework\Constraint\Exception;

class UseradminController extends Controller
{
    public function __construct()
    {
      //parent::__construct();
    }
    
    public function submitLogin(){
        
        //echo 1;exit;
        return view('Useradmin.submitLogin');
    }
    
    public function login(Request $request)
    {

        $userdata = $request->all();
        //print_r($userdata);exit;
        $condition = ['email'=>$request->input('email') , 'password'=> md5($request->input('password'))];
        $user = DB::table('users')->where($condition)->first();
        //print_r($user); exit;
        if(!empty($user)){
            Session::put('id', $user->id);
            Session::put('email', $user->email);
            Session::put('name', $user->first_name);
            
            Session::flash('message', 'Successfully Logged In.');
            return redirect('/admindashboard');
            
        }else{
            Session::flash('message', 'Invalid Email ID or Password');
            return redirect('/admin');
        }
        
    }
    
    public function admindashboard(){
        //echo "in dashboard"; exit;
       $all_session = session()->all();
       $email = $all_session['email'];
       if(!empty($email)){
           $condition = ['email' => $email];
           $fetch_details = DB::table('users')->where($condition)->first();
           //print_r($fetch_details); exit;
           $user_type = $fetch_details->user_type;
           if($user_type != 99){
                Session::flash('message', 'Permission Denied');
                return redirect('/admin');
           }else{
               return view('Useradmin.admindashboard');
           }
           
       }else{
           Session::flash('message', 'Invalid Email ID or Password');
           return redirect('/admin');
       }
       //print_r($all_session);exit;
        
    }
    
    public function admineditprofile(){
       $all_session = session()->all();
       $email = $all_session['email'];
       if(!empty($email)){
           $condition = ['email' => $email];
           $fetch_details = DB::table('users')->where($condition)->first();
           return view('Useradmin.admindashboard',['admin_details'=>$fetch_details]);
           
       }else{
           Session::flash('message', 'Invalid Email ID or Password');
           return redirect('/admin');
       }
    }
    
    public function adminlogout(){
        Auth::logout();
        Session::flush();
        Session::flash('message', 'Successfully Logged out.');
        return redirect('/admin');
    }
}
