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
use App\Size;
use App\Numbersize;

class SizeController extends Controller
{
    public function listsize(){
        //echo 1;exit;
        $user = User::find(Auth::user()->id); 
        $size =[];
        $size_list = DB::table('sizes')->get();
        return view('Size.listsize',compact('size_list','size'));
    }
    
    public function showsizelist($type_id){
        $user = User::find(Auth::user()->id); 
        $size =[];
        $size_type_id = base64_decode($type_id);
        //$size_list_number = DB::table('numbersizes')->join('sizes', 'sizes.id', '=', 'numbersizes.size_type_id')->where("numbersizes.size_type_id",$size_type_id)->get();
        $size_list_number = DB::table('numbersizes')
                ->join('sizes', 'sizes.id', '=', 'numbersizes.size_type_id')
                ->where("numbersizes.size_type_id",$size_type_id)
                ->select('numbersizes.*', 'sizes.size_name')
                ->get();
                //->pluck('numbersizes.id','numbersizes.size_number','numbersizes.created_at','sizes.size_name');
        //print_r($size_list_number); exit;
        return view('Size.showsizelist',compact('size_list_number','size'));
    }
    
    
    public function addsize(){
        $user = User::find(Auth::user()->id); 
        $size =[];
        
        return view('Size.addsize',compact('size'));
    }
    public function addsizenumber(){
        $user = User::find(Auth::user()->id); 
        $size =[];
        $fetch_size_type_list = DB::table('sizes')->get();
        return view('Size.addsizenumber',compact('size','fetch_size_type_list'));
    }
    
    public function editsize($size_id){
        $user = User::find(Auth::user()->id); 
        $siz_id = base64_decode($size_id);
        $numbersizes =[];
        
        $fetch_size = DB::table('sizes')->where("id",$siz_id)->first();
        //print_r($allcategory); exit;
        return view('Size.editsize',compact('user','fetch_size','numbersizes'));
    }
    
    public function editsizenumber($size_id){
        $user = User::find(Auth::user()->id); 
        $siz_id = base64_decode($size_id);
        $size =[];
        
        $fetch_size = DB::table('numbersizes')->where("id",$siz_id)->first();
        $fetch_size_type_list = DB::table('sizes')->get();
        //print_r($fetch_size_type_list); exit;
        return view('Size.editsizenumber',compact('user','fetch_size','size','fetch_size_type_list'));
    }
    
    public function savesize(Request $request){
        $user = Auth::user()->id; 
        $input = request()->except(['_token']);
        
        $input['created_at']= date('Y-m-d H:i:s');
        
        
        //print_r($input); exit;
        
        DB::table('sizes')->insert($input);
        
        Session::flash('message', 'Size is successfully added.');
        return redirect('admin/listsize');
    }
    public function savesizenumber(Request $request){
        $user = Auth::user()->id; 
        $input = request()->except(['_token']);
        
        $input['created_at']= date('Y-m-d H:i:s');
        
        
        //print_r($input); exit;
        
        $lastid = DB::table('numbersizes')->insertGetId($input);
        
        $get_details = DB::table('numbersizes')->where("id",$lastid)->get();
        
        Session::flash('message', 'Size number is successfully added.');
        return redirect('admin/showsizelist/'.base64_encode($get_details[0]->size_type_id));
    }
    
    public function savesizeedit(Request $request,$size_id){
        $user = Auth::user()->id; 
        $input = request()->except(['_token']);
        $siz_id = base64_decode($size_id); 
        
        
        $input['updated_at']= date('Y-m-d H:i:s');
        
        //print_r($input); exit;
        
        DB::table('sizes')->where("id",$siz_id)->update($input);
        
        Session::flash('message', 'Size is successfully edited.');
        //return Redirect::back();
        return redirect('admin/listsize');
    }
    public function savesizenumedit(Request $request,$size_id){
        $user = Auth::user()->id; 
        $input = request()->except(['_token']);
        $siz_id = base64_decode($size_id); 
        
        
        $input['updated_at']= date('Y-m-d H:i:s');
        
        $get_details = DB::table('numbersizes')->where("id",$siz_id)->get();
        
        DB::table('numbersizes')->where("id",$siz_id)->update($input);
        
        
        Session::flash('message', 'Size number is successfully edited.');
        
        return redirect('admin/showsizelist/'.base64_encode($get_details[0]->size_type_id));
    }
    
    public function deletesize($size_id){
        $user = Auth::user()->id; 
        $siz_id = base64_decode($size_id); 
         DB::table('sizes')->where("id",$siz_id)->delete();
        
            Session::flash('message', 'successfully deleted.');
            return redirect('admin/listsize');
        
    }
    public function deletesizenumber($size_id){
        $user = Auth::user()->id; 
        $siz_id = base64_decode($size_id); 
        $get_details = DB::table('numbersizes')->where("id",$siz_id)->get();
        //print_r($get_details); exit;
         DB::table('numbersizes')->where("id",$siz_id)->delete();
        
            Session::flash('message', 'successfully deleted.');
            return redirect('admin/showsizelist/'.base64_encode($get_details[0]->size_type_id));
        
    }
}
