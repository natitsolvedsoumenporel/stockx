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
use App\siteSetting;


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
    
    public function editsite(){
        $siteSetting = siteSetting::find(1);
        //print_r($siteSetting); exit;
        return view('Useradmin.editsite',compact('siteSetting'));
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
    
    public function sitesave(Request $request) {
        
        //$user = Auth::user()->id; 
        $input = request()->except(['_token','hideimg']);

        if ($request->hasFile('logo')) {
            try {
                $file = $request->file('logo');
                $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
                # save to DB
                $input['logo'] = 'images/logo/'.$name;
                $request->file('logo')->move("images/logo", $name);
            } catch (Illuminate\Filesystem\FileNotFoundException $e) {
                echo $e->getMessage();
            }
        } else {
            $input['logo'] = $request->input('hideimg');
        }
        $input['updated_at'] = date('Y-m-d H:i:s');
        //print_r($input);exit;
        siteSetting::where('id', '1')->update($input);
        Session::flash('message', 'Site is Successfully updated.');
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

    public function listusers(){
        $user = User::find(Auth::user()->id);
        
        $user_details = User::where('user_type','!=',99)->get()->toArray();
        //print_r($user_details); exit;
        return view('Useradmin.listuser',compact('user','user_details'));
    }
    
    public function adduser(){
        $user = User::find(Auth::user()->id);
        $user = array();
        return view('Useradmin.adduser',compact('user'));
    }
    
    public function edituser($user_id){
        $user = User::find(base64_decode($user_id));
        //print_r($user); exit;
        //$user = array();
        return view('Useradmin.edituser',compact('user'));
    }
    public function viewuser($user_id){
        $user = User::find(base64_decode($user_id))->toArray();
        //print_r($user); exit;
        
        return view('Useradmin.viewuser',compact('user'));
    }
    public function statususer($user_id){
        $user = User::find(base64_decode($user_id))->toArray();
        //print_r($user); exit;
        $status = $user['approve'];
        if($status == 0){
            $data['approve']=1;
        }else{
            $data['approve']=0;
        }
        DB::table('users')->where("id",base64_decode($user_id))->update($data);
        return redirect('admin/listusers');
    }
    
    public function saveuseredit(Request $request,$u_id){
        
        $input = request()->except(['_token','hideimg']);
        $user_id = base64_decode($u_id); 
        if ($request->hasFile('image')) {
            try {
                $file = $request->file('image');
                $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
                # save to DB
                $input['image'] = 'images/category/'.$name;
                $request->file('image')->move("images/category", $name);
            } catch (Illuminate\Filesystem\FileNotFoundException $e) {
                echo $e->getMessage();
            }
        } else {
            $input['image'] = $request->input('hideimg');
        }
        
        if($request->input('is_active')){
            $input['is_active'] = 1;
        }else{
            $input['is_active'] = 0;
        }
        $input['password']= Hash::make($request->input('password'));
        
        $input['updated_at']= date('Y-m-d H:i:s');
        //print_r($input);exit;
        DB::table('users')->where("id",$user_id)->update($input);
        
        Session::flash('message', 'User is successfully edited.');
        //return Redirect::back();
        return redirect('admin/listusers');
    }
    
    public function saveuser(Request $request){
        $user = Auth::user()->id; 
        $input = request()->except(['_token']);
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
            $input['image'] = "";
        }
        
        if($request->input('is_active')){
            $input['is_active'] = 1;
        }else{
            $input['is_active'] = 0;
        }
        
        $input['password'] = Hash::make($request->input('password'));
        $input['created_at']= date('Y-m-d H:i:s');
        
        
        //print_r($input); exit;
        
        DB::table('users')->insert($input);
        
        Session::flash('message', 'User is successfully added.');
        return redirect('admin/listusers');
    }
    
    public function deleteuser($us_id){
        $user_id = base64_decode($us_id); 
        DB::table('users')->where("id",$user_id)->delete();
        return redirect('admin/listusers');
    }
    
    public function logout(){
        Auth::logout();
        Session::flash('message', 'Successfully Logged out.');
        return redirect('/admin');
    }
}
