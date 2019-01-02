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
use App\cms_category;

class CmscategoryController extends Controller
{
    public function listcategorycms(){
        
        $all_cmscat = cms_category::get()->toArray();  
        //print_r($all_cmscat); exit;
        return view('Cmscategory.listcategorycms',compact('all_cmscat'));
    }
    
    public function addcategorycms(){
        $cmscategory =array();
        
        return view('Cmscategory.addcategorycms',compact('cmscategory'));
    }
    
    public function editcategorycms($id){
        $user = User::find(Auth::user()->id); 
        $id = base64_decode($id);
        $cmscat = [];
        
        $cmscat = DB::table('cms_category')->where("id",$id)->first();
        //print_r($allcategory); exit;
        return view('Cmscategory.editcategorycms',compact('user','cmscat'));
    }
    
    public function savecmscatedit(Request $request,$id){
        $user = Auth::user()->id; 
        $input = request()->except(['_token']);
        $id = base64_decode($id); 
        
        if($request->input('status')){
            $input['status'] = 1;
        }else{
            $input['status'] = 0;
        }
        $input['updated_at']= date('Y-m-d H:i:s');
        
        //print_r($input); exit;
        
        DB::table('cms_category')->where("id",$id)->update($input);
        
        Session::flash('message', 'Cms Category is successfully edited.');
        //return Redirect::back();
        return redirect('admin/listcategorycms');
    }
    
    public function savecmscategory(Request $request){
        $user = Auth::user()->id; 
        $input = request()->except(['_token']);
        
        if($request->input('status')){
            $input['status'] = 1;
        }else{
            $input['status'] = 0;
        }
        $input['created_at']= date('Y-m-d H:i:s');
        
        
        DB::table('cms_category')->insert($input);
        
        Session::flash('message', 'Cms category is successfully added.');
        return redirect('admin/listcategorycms');
    }
    
    public function deletecmscategory($id){
        $user = Auth::user()->id; 
        $id = base64_decode($id);
        
        DB::table('cms_category')->where("id",$id)->delete();
       
        Session::flash('message', 'successfully deleted.');
        return redirect('admin/listcategorycms');
        
    }
}
