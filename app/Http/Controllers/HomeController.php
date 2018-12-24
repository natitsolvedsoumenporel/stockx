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
use App\allcategory;
use App\Color;
use App\Brand;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth')->except(['login']);
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
        
        //$user_id = Auth::user()->id;
        
        if(!empty(Auth::user()->id)){
            return redirect('/');
        }else{
            return view('Home.login');
        }
    }
    
    public function signup(){
        if(!empty(Auth::user()->id)){
            return redirect('/');
        }else{
            return view('Home.signup');
        }
    }
    
    public function product_list(){
        $categories = allcategory::where('parent_id',0)->get()->toArray();
        $colors = Color::where('is_active',1)->get()->toArray();
        $brands = Brand::where('is_active',1)->get()->toArray();
        //print_r($brands); exit;
        //print_r($categories);exit;
        return view('Home/product_list',compact('brands','colors','categories'));
    }
    
    public function get_subcat(Request $request){
        $data = array();
        $parent_id = $request->input('parent_id');
        //$condition = array();
        $get_all_subcat = allcategory::where("parent_id",$parent_id)->get();
        //print_r($get_all_subcat); exit;
        if(!empty($get_all_subcat)){
            
            $html = "<option value=''>Select subcategory</option>";

            foreach($get_all_subcat as $subcatKey => $subcatVal){

                $html .= "<option value='".$subcatVal['cat_id']."'>".$subcatVal['category_name']."</option>";
            }
            $data['ack'] = 1;
            $data['htm'] = $html;
        }else{
            $data['ack'] = 0;
            $data['htm'] = "";
        }
       
        echo json_encode($data); exit;
        
    }
    
    public function product_search(Request $request){
        
        
        $all_data = $request->input();
        $data = array();
        //print_r($all_data);exit;
        $min_price = $all_data['minprice'];
        $max_price = $all_data['maxprice'];//
        $product_name = $all_data['product_name'];
        $brand_id = $all_data['brand_id'];//
        $subcat_id = $all_data['subcat_id'];//
        $cat_id = $all_data['cat_id'];//
        $color_id = $all_data['color_id'];
        
        
        $query = DB::table('products')->where('is_active',1);
        //print_r($all_query); exit;
        
        
        if(!empty($cat_id)){
            $query = $query->where('cat_id','=', $cat_id);
        }
        
        if(!empty($subcat_id)){
            $query = $query->where('subcat_id','=', $subcat_id);
        }
        
        if(!empty($color_id)){
            $query = $query->where('color_id',$color_id);
        }
        
        if(!empty($brand_id)){
            $query = $query->where('brand_id',$brand_id);
        }
        
        if(!empty($min_price) && !empty($max_price)){
            
            $query = $query->whereBetween('price',[$min_price,$max_price]);
        }
//        if(!empty($max_price)){
//            $query = $query->where('price','<=', $max_price);
//        }
        
        
        
        if(!empty($product_name)){
            $query = $query->where('p_name', 'like', '%'.$product_name.'%');
        }
        //echo $query;exit;
        $get_all_product = $query->get()->toArray();
        $html = "";
        if(count($get_all_product) > 0){
            $grouped_product = array_chunk($get_all_product,3);
            //print_r($grouped_product);
            //exit;
            
        
            foreach($grouped_product as $key => $val){
                $html .= '<div class="row">';

                foreach($val as $resultKey => $resultVal){
                    $html .= '<div class="column">
                                <div class="most-popu">						
                                    <div class="most-popu-pic">
                                        <div class="overlay-div">
                                            <a href="#" class="d-inline-block">
                                                <img class="img-fluid" src="assets/frontend/images/shop-cart.png" alt="" >
                                            </a>

                                            <a href="#" class="d-inline-block">
                                                <img class="img-fluid" src="assets/frontend/images/hammer.png" alt="">									 
                                            </a>
                                        </div>
                                        <img class="img-fluid" src="assets/frontend/images/featured-d.png" alt="">
                                    </div>
                                    <div class="most-popu-text">
                                        <h4>'.$resultVal->p_name.'</h4>
                                        <div class="most-popu-text-btm">
                                            <span class="most-popu-text-btm-lt">
                                                <p>LOWEST ASK</p>
                                                <h1>$127</h1>
                                            </span>
                                            <span class="most-popu-text-btm-rt">
                                                <h6>$'.$resultVal->price.' Sold</h6>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                }
                $html .= '</div>';
            }
            
            $data['ack'] = 1;
            $data['htm'] = $html;
            
            
        }else{
            
            $html .= '<div class="row">No data Found</div>';
            $data['ack'] = 0;
            $data['htm'] = $html;
        }
        $data['total'] = count($get_all_product);
        echo json_encode($data); exit;
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
    
    public function aftersignupfrontend(Request $request){
        //echo 1;exit;
        $input = request()->except(['_token','agree']);
        $agree = $request->input('agree');
        if($agree == 'on'){
            
            $check_presence = User::where('email',$request->input('email'))->get()->first();
            //print_r($check_presence);exit;
            if(!empty($check_presence)){
                Session::flash('message', 'This mail is already registered Please use forget password to recover your account');
                return redirect('/signup');
            }else{
                
                $input['is_active'] = 0;
                $input['created_at'] = date('Y-m-d H:i:s');
                $input['user_type'] = 2;
                $input['approve'] = 0;
                $input['password'] = Hash::make($request->input('password'));
                $user_data_insert = DB::table('users')->insertGetId($input);
                $user_details = User::where('email',$request->input('email'))->get()->first();
                $email = $request->input('email');
                    if($email){
                        //$user_data['email']= $email;
                        $formEmail = "maitrayee@natitsolved.com";
                        $formName = "Maitrayee";
                        $to = $email;
                        
                        $id = base64_encode("secure".base64_encode($user_data_insert));
                        $link = url('').'/active/'.$id;
                        
                        $admin_details = DB::table('users')->where("user_type",99)->first();
                        
                        $get_email_body = emailTemplate::select('content','subject')->where('id',1)->get()->toArray();
                 
                        $subject = $get_email_body[0]['subject'];
                 
                        $htmlContent = str_replace(array('[NAME]', '[LINK]'), array($user_details->first_name, $link), $get_email_body[0]['content']);
       
                        $from = $admin_details->email;
                            Mail::raw([], function ($message)use($htmlContent, $to, $subject, $from) {
                            $message->to($to);
                                $message->from($from, "Stockx");

                            $message->subject($subject);
                            $message->setBody($htmlContent, 'text/html' );
                        });        


                        if (Mail::failures()) {
                            $Msg = "fail";//exit;
                            // return response showing failed emails
                        }else{

                        $Msg = 'Please Check your mail to activate your account';
                        }
                
            }
            
            
            }  
            
        }else{
            Session::flash('message', 'Please Check check me out');
            return redirect('/signup');
        }
        
        //print_r($input); exit;
        Session::flash('message', 'Please Check your mail to activate your account');
        return redirect('/signup');
    }
    
    public function active($id){
        $user_id = base64_decode(trim(str_replace('secure','',base64_decode($id)))); 
        
        $data['is_active'] = 1;
        DB::table('users')->where("id",$user_id)->update($data);
        Session::flash('message', 'Your account is successfully activated, Please login now');
        return redirect('/login');
        
    }
    
    public function forgetpassword(){
       if(!empty(Auth::user()->id)){
            return redirect('/');
        }else{
            return view('Home.forgetpassword');
        }
    }
    
    public function changepassmailsend(Request $request){
        $input = request()->except(['_token']);
        
        $check_presence = User::where('email',$request->input('email'))->first();
        if(empty($check_presence)){
            Session::flash('message', 'This mail is invalid');
            return redirect('/signup');
        }else{
            $email = $request->input('email');
            $user_details = User::where('email',$request->input('email'))->get()->first();
            if($email){
                //$user_data['email']= $email;
                $formEmail = "maitrayee@natitsolved.com";
                $formName = "Maitrayee";
                $to = $email;

                $id = base64_encode("secure".base64_encode($check_presence->id));
                $link = url('').'/recoveraccount/'.$id;

                $admin_details = DB::table('users')->where("user_type",99)->first();
                $subject = "Forget Password";
                $get_email_body = emailTemplate::select('content','subject')->where('id',2)->get()->toArray();

                $subject = $get_email_body[0]['subject'];
         
                $htmlContent = str_replace(array('[NAME]', '[LINK]'), array($user_details->first_name, $link), $get_email_body[0]['content']);
       
                $from = $admin_details->email;
                    Mail::raw([], function ($message)use($htmlContent, $to, $subject, $from) {
                    $message->to($to);
                        $message->from($from, "Stockx");

                    $message->subject($subject);
                    $message->setBody($htmlContent, 'text/html' );
                });        


                if (Mail::failures()) {
                    Session::flash('message', 'Mail fail');
                    return redirect('/forgetpassword');
                }else{

                
                Session::flash('message', 'Your Password reset link is sent to entered email');
                return redirect('/forgetpassword');
                }
            }
        }
        
    }
    
    public function recoveraccount($id){
        if(!empty(Auth::user()->id)){
            return redirect('/');
        }else{
            return view('Home.setpassword',compact('id'));
        }
    }
    
    public function resetpassword(Request $request){
        //$input = request()->except(['_token','user','confpassword']);
        $input['password'] = Hash::make($request->input('password'));
        $user_id = base64_decode(trim(str_replace('secure','',base64_decode($request->input('user'))))); 
        $check_presence = User::where('id',$user_id)->first();
        if(empty($check_presence)){
            Session::flash('message', 'Invalid user');
            return redirect('/signup');
        }else{
            DB::table('users')->where("id",$user_id)->update($input);
            Session::flash('message', 'Password is successfully updated');
            return redirect('/login');
        }
        
        
    }
    
    public function logout(){
        Auth::logout();
        Session::flash('message', 'Successfully Logged out.');
        return redirect('/');
    }
}
