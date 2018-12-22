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
use App\Brand;

class BrandController extends Controller
{
    public function listbrand(){
        
        $all_brand = Brand::get()->toArray();  
        //print_r($all_brand); exit;
        return view('Brand.listbrand',compact('all_brand'));
    }
    
    public function addbrand(){
        $brand =array();
        
        return view('Brand.addbrand',compact('brand'));
    }
    
    public function editbrand($brand_id){
        $user = User::find(Auth::user()->id); 
        $brand_id = base64_decode($brand_id);
        $brand = [];
        
        $brand = DB::table('brands')->where("id",$brand_id)->first();
        //print_r($allcategory); exit;
        return view('Brand.editbrand',compact('user','brand'));
    }
    
    public function editbrandsave(Request $request,$brand_id){
        $user = Auth::user()->id; 
        $input = request()->except(['_token']);
        $brand_id = base64_decode($brand_id); 
        
        if($request->input('is_active')){
            $input['is_active'] = 1;
        }else{
            $input['is_active'] = 0;
        }
        $input['updated_at']= date('Y-m-d H:i:s');
        
        //print_r($input); exit;
        
        DB::table('brands')->where("id",$brand_id)->update($input);
        
        Session::flash('message', 'Brand is successfully edited.');
        //return Redirect::back();
        return redirect('admin/listbrand');
    }
    
    public function addbrandsave(Request $request){
        $user = Auth::user()->id; 
        $input = request()->except(['_token']);
        
        if($request->input('is_active')){
            $input['is_active'] = 1;
        }else{
            $input['is_active'] = 0;
        }
        $input['created_at']= date('Y-m-d H:i:s');
        
        
        DB::table('brands')->insert($input);
        
        Session::flash('message', 'Brand is successfully added.');
        return redirect('admin/listbrand');
    }
    
    public function deletebrand($brand_id){
        $user = Auth::user()->id; 
        $brand_id = base64_decode($brand_id); 
        
        DB::table('brands')->where("id",$brand_id)->delete();
       
        Session::flash('message', 'successfully deleted.');
        return redirect('admin/listbrand');
        
    }
}
