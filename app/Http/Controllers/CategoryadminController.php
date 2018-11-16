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
use App\allcategory;

class CategoryadminController extends Controller
{
    public function listcategory(){
        $user = User::find(Auth::user()->id); 
        $condition =['parent_id'=> 0];
        $parent_category = DB::table('allcategory')->where($condition)->get();
        
        //print_r($parent_category);exit;
        return view('Categoryadmin.listcategory',compact('user','parent_category'));
    }
    
    public function listsubcategory(){
       $user = User::find(Auth::user()->id); 
        
       //$sub_category = DB::table('allcategory')->where('parent_id','!=',0)->get();
       $sub_category =  allcategory::with('parentcategory')->where('parent_id','!=',0)->get()->toArray();    
       
       return view('Categoryadmin.listsubcategory',compact('user','sub_category'));
    }
    
    
    public function addparentcategory(){
        $user = User::find(Auth::user()->id); 
        $category = [];
        return view('Categoryadmin.addparentcategory',compact('user','category'));
    }
    
    public function addsubcategory(){
        $user = User::find(Auth::user()->id); 
        $category = [];
        $condition =['parent_id'=> 0];
        $parent_category = allcategory::where($condition)->pluck('category_name','cat_id');
        return view('Categoryadmin.addsubcategory',compact('user','category','parent_category'));
    }
    
    public function editcategory($cate_id){
        $user = User::find(Auth::user()->id); 
        $cat_id = base64_decode($cate_id);
        $allcategory = [];
        
        $allcategory = DB::table('allcategory')->where("cat_id",$cat_id)->first();
        //print_r($allcategory); exit;
        return view('Categoryadmin.editcategory',compact('user','allcategory'));
    }
    public function editsubcategory($cate_id){
        $user = User::find(Auth::user()->id); 
        $cat_id = base64_decode($cate_id);
        $allcategory = [];
        $allcategory = DB::table('allcategory')->where("cat_id",$cat_id)->first();
        
        $condition =['parent_id'=> 0];
        $parent_category = allcategory::where($condition)->pluck('category_name','cat_id');
        return view('Categoryadmin.editsubcategory',compact('user','allcategory','parent_category'));
    }
    
    public function saveparentcat(Request $request){
        $user = Auth::user()->id; 
        $input = request()->except(['_token']);
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
            $input['image'] = "";
        }
        if($request->input('is_active')){
            $input['is_active'] = 1;
        }else{
            $input['is_active'] = 0;
        }
        $input['created_at']= date('Y-m-d H:i:s');
        $input['parent_id'] = 0;
        $input['category_type'] = 'parent';
        
        //print_r($input); exit;
        
        DB::table('allcategory')->insert($input);
        
        Session::flash('message', 'Parent Category is successfully added.');
        return redirect('admin/listcategory');
    }
    
    public function saveparentcatedit(Request $request,$cat_id){
        $user = Auth::user()->id; 
        $input = request()->except(['_token','hidepimg']);
        $cat_id = base64_decode($cat_id); 
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
            $input['image'] = $request->input('hidepimg');
        }
        if($request->input('is_active')){
            $input['is_active'] = 1;
        }else{
            $input['is_active'] = 0;
        }
        $input['updated_at']= date('Y-m-d H:i:s');
        
        //print_r($input); exit;
        
        DB::table('allcategory')->where("cat_id",$cat_id)->update($input);
        
        Session::flash('message', 'Parent Category is successfully edited.');
        //return Redirect::back();
        return redirect('admin/listcategory');
    }
    public function savesubcat(Request $request){
        $user = Auth::user()->id; 
        $input = request()->except(['_token']);
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
            $input['image'] = "";
        }
        if($request->input('is_active')){
            $input['is_active'] = 1;
        }else{
            $input['is_active'] = 0;
        }
        $input['created_at']= date('Y-m-d H:i:s');
        $input['category_type'] = 'parent';
        
        //print_r($input); exit;
        
        DB::table('allcategory')->insert($input);
        
        Session::flash('message', 'Parent Category is successfully added.');
        //return Redirect::back();
        return redirect('admin/listsubcategory');
    }
    
    public function savesubcatedit(Request $request,$cat_id){
        $user = Auth::user()->id; 
        $input = request()->except(['_token','hidepimg']);
        $cat_id = base64_decode($cat_id); 
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
            $input['image'] = $request->input('hidepimg');
        }
        if($request->input('is_active')){
            $input['is_active'] = 1;
        }else{
            $input['is_active'] = 0;
        }
        $input['updated_at']= date('Y-m-d H:i:s');
        
        //print_r($input); exit;
        
        DB::table('allcategory')->where("cat_id",$cat_id)->update($input);
        
        Session::flash('message', 'Parent Category is successfully edited.');
        return redirect('admin/listsubcategory');
    }
    
    public function deletecategory($cat_id,$cat_type){
        $user = Auth::user()->id; 
        $cat_id = base64_decode($cat_id); 
        $cat_type = base64_decode($cat_type); 
        DB::table('allcategory')->where("cat_id",$cat_id)->delete();
        if($cat_type == "subdel"){
            Session::flash('message', 'successfully deleted.');
            return redirect('admin/listsubcategory');
        }else{
            Session::flash('message', 'successfully deleted.');
            return redirect('admin/listcategory');
        }
    }
}
