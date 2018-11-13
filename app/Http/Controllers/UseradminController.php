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


class UseradminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['submitLogin','login']);
    }
    
    public function submitLogin(){
        if(Auth::user()){
            return redirect('admin/dashboard');
        } else {
            return view('Useradmin.submitLogin');
        }
    }
    
    public function login(Request $request)
    {   
        $userdata = $request->all();
        $condition = ['email'=>$request->input('email') , 'password'=> ($request->input('password'))]; 
        
        $user = DB::table('users')->where($condition)->first();
        
        if(Auth::attempt($condition)){
            Session::flash('message', 'Successfully Logged In.');
            return redirect('admin/dashboard');
        }else{
            Session::flash('message', 'Invalid Email ID or Password');
            return redirect('/admin');
        }
    }
    
    public function dashboard(){
        return view('Useradmin.admindashboard');
       
    }
 
    public function profile(){
        $user = User::find(Auth::user()->id); 
        return view('Useradmin.profile',compact('user'));
    }
    
    public function changepassword(){
        $user = User::find(Auth::user()->id); 
        return view('Useradmin.changepassword',compact('user'));
    }
    
    public function paymentsetting(){
        $user = User::find(Auth::user()->id);
        return view('Useradmin.paymentsetting',compact('user'));
    }

    public function profilesave(Request $request, User $user) {
        
        $user = Auth::user()->id; 
        $input = request()->except(['_token','hideimg']);

        if ($request->hasFile('image')) {
            try {
                $file = $request->file('image');
                $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
                # save to DB
                $input['image'] = 'images/users/'.$name;
                $request->file('image')->move("images/users", $name);
            } catch (Illuminate\Filesystem\FileNotFoundException $e) {
                echo $e->getMessage();
            }
        } else {
            $input['image'] = $request->input('hideimg');
        }
        
        User::where('id', $user)->update($input);
        Session::flash('message', 'Profile data is Successfully updated.');
        return Redirect::back();
    
    }
    
    public function passwordsave(Request $request, User $user){
        $user = Auth::user()->id; 
        $update_array = [];
        $userDetails = DB::table('users')->where('id', Auth::user()->id)->first();
        $get_email = $userDetails->email;
        $old_password = $request->input('old_password');
        $new_password = $request->input('new_password');
        
        $condition = ['email'=>$get_email , 'password'=> ($old_password)];
        
        if(Auth::attempt($condition)){
            
            $password = Hash::make($new_password);
            $update_array['password'] = $password;
            
            User::where('id', $user)->update($update_array);
            Session::flash('message', 'Password is Successfully updated.');
        }else{
            Session::flash('message', 'Current Password is wrong');
        }
        
        return Redirect::back();
    }
    
    public function savepayment(Request $request, User $user){
        $user = Auth::user()->id; 
        
        $input = request()->except(['_token']);
        //print_r($input); exit;
        User::where('id', $user)->update($input);
        Session::flash('message', 'Payment Details is Successfully updated.');
        return Redirect::back();
    }


    
    public function logout(){
        Auth::logout();
        Session::flash('message', 'Successfully Logged out.');
        return redirect('/admin');
    }
}
