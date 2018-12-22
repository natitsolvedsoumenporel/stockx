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
use App\Color;

class ColorController extends Controller
{
    public function listcolor(){
        
        $all_color = Color::get()->toArray();  
        //print_r($all_brand); exit;
        return view('Color.listcolor',compact('all_color'));
    }
    
    public function addcolor(){
        $color =array();
        
        return view('Color.addcolor',compact('color'));
    }
    
    public function editcolor($color_id){
        $user = User::find(Auth::user()->id); 
        $color_id = base64_decode($color_id);
        $color = [];
        
        $color = DB::table('colors')->where("id",$brand_id)->first();
        //print_r($allcategory); exit;
        return view('Color.editcolor',compact('user','color'));
    }
    
    public function editcolorsave(Request $request,$color_id){
        $user = Auth::user()->id; 
        $input = request()->except(['_token']);
        $color_id = base64_decode($color_id); 
        
        if($request->input('is_active')){
            $input['is_active'] = 1;
        }else{
            $input['is_active'] = 0;
        }
        $input['updated_at']= date('Y-m-d H:i:s');
        
        //print_r($input); exit;
        
        DB::table('colors')->where("id",$brand_id)->update($input);
        
        Session::flash('message', 'Color is successfully edited.');
        //return Redirect::back();
        return redirect('admin/listcolor');
    }
    
    public function addcolorsave(Request $request){
        $user = Auth::user()->id; 
        $input = request()->except(['_token']);
        
        if($request->input('is_active')){
            $input['is_active'] = 1;
        }else{
            $input['is_active'] = 0;
        }
        $input['created_at']= date('Y-m-d H:i:s');
        
        
        DB::table('colors')->insert($input);
        
        Session::flash('message', 'Color is successfully added.');
        return redirect('admin/listcolor');
    }
    
    public function deletecolor($color_id){
        $user = Auth::user()->id; 
        $color_id = base64_decode($color_id); 
        
        DB::table('colors')->where("id",$color_id)->delete();
       
        Session::flash('message', 'successfully deleted.');
        return redirect('admin/listcolor');
        
    }
}
