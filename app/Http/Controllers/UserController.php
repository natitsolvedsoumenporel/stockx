<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PHPUnit\Framework\Constraint\Exception;
use Hash;
use Auth;
use Mail;
use Session;
use Validator;
use App\User;
use App\emailTemplate;

class UserController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->except(['submitLogin','login']);
    }
    
    public function profile(){
        //echo 1;exit;
         return view('User.profile');
    }
    
    public function editprofile(){
        $user = User::find(Auth::user()->id);
        
        return view('User.editprofile',compact('user'));
    }
    
    public function savedetails(Request $request){
        $user_id = Auth::user()->id;
        $input = request()->except(['_token']);
        
        DB::table('users')->where("id",$user_id)->update($input);
        Session::flash('message', 'User details is successfully updated');
        return Redirect::back();
    }
    
    public function profilepass(){
        return view('User.profilepass');
    }
    
    public function savepass(Request $request){
        $user_id = Auth::user()->id;
        $user = User::find(Auth::user()->id)->toArray();
        
        $condition = ['email'=>$user['email'] , 'password'=> ($request->input('currpassword'))]; 
       //print_r($condition); exit;
        if(Auth::attempt($condition)){
            //echo 1;exit;
            $input['password'] = Hash::make($request->input('password'));
            //print_r($input); exit;
            DB::table('users')->where("id",$user_id)->update($input);
            
            $to = $user['email'];

                $admin_details = DB::table('users')->where("user_type",99)->first();
                
                $get_email_body = emailTemplate::select('content','subject')->where('id',4)->get()->toArray();
                //print_r($get_email_body); exit;
            
                $subject = $get_email_body[0]['subject'];
         
                $htmlContent = str_replace(array('[NAME]'), array($user['first_name']), $get_email_body[0]['content']);
       
                $from = $admin_details->email;

                    Mail::raw([], function ($message)use($htmlContent, $to, $subject, $from) {
                    $message->to($to);
                        $message->from($from, "Stockx");

                    $message->subject($subject);
                    $message->setBody($htmlContent, 'text/html' );
                });        

                if (Mail::failures()) {
                    Session::flash('message', 'Mail fail');
                    return redirect('/profilepass');
                }else{
                    Session::flash('message', 'Password is successfully updated');
                    return redirect('/profile');
                }

        }else{
            Session::flash('message', 'Wrong Current Password');
            return redirect('/profilepass');
        }
    }
}
