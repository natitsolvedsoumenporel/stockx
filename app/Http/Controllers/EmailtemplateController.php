<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PHPUnit\Framework\Constraint\Exception;
use Auth;
use Session;
use Validator;
use App\User;
use App\emailTemplate;

class EmailtemplateController extends Controller
{
    public function listemail(){
        
        $all_emailtemplate = emailTemplate::get()->toArray();  
        
        return view('Emailtemplate.listemail',compact('all_emailtemplate'));
    }
    
    public function addemail(){
        $emailTemplate =array();
        
        return view('Emailtemplate.addemail',compact('emailTemplate'));
    }
    
    public function editemail($email_id){
        $user = User::find(Auth::user()->id); 
        $email_id = base64_decode($email_id);
        $emailTemplate = [];
        
        $emailTemplate = DB::table('emailTemplate')->where("id",$email_id)->first();
        //print_r($allcategory); exit;
        return view('Emailtemplate.editemail',compact('user','emailTemplate'));
    }
    
    public function editemailsave(Request $request,$email_id){
        $user = Auth::user()->id; 
        $input = request()->except(['_token']);
        $email_id = base64_decode($email_id); 
        
        if($request->input('activated')){
            $input['activated'] = 1;
        }else{
            $input['activated'] = 0;
        }
        $input['updated_at']= date('Y-m-d H:i:s');
        
        //print_r($input); exit;
        
        DB::table('emailTemplate')->where("id",$email_id)->update($input);
        
        Session::flash('message', 'Parent Category is successfully edited.');
        //return Redirect::back();
        return redirect('admin/listemail');
    }
    
    public function addemailsave(Request $request){
        $user = Auth::user()->id; 
        $input = request()->except(['_token']);
        
        if($request->input('activated')){
            $input['activated'] = 1;
        }else{
            $input['activated'] = 0;
        }
        $input['created_at']= date('Y-m-d H:i:s');
        
        
        DB::table('emailTemplate')->insert($input);
        
        Session::flash('message', 'Email template is successfully added.');
        return redirect('admin/listemail');
    }
    
    public function deleteemail($email_id){
        $user = Auth::user()->id; 
        $email_id = base64_decode($email_id); 
        
        DB::table('emailTemplate')->where("id",$email_id)->delete();
       
        Session::flash('message', 'successfully deleted.');
        return redirect('admin/listemail');
        
    }
}
