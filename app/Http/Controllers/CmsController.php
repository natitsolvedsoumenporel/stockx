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
use App\cms_page;

class CmsController extends Controller
{
    public function listcms(){
        
        $all_cms = cms_page::get()->toArray();  
        //print_r($all_cms); exit;
        return view('Cms.listcms',compact('all_cms'));
    }
    
    public function addcms(){
        $cms =array();
        $cmscatlists = cms_category::where('status', 1)
        ->orderBy('name')
        ->pluck('name','id');
        
        return view('Cms.addcms',compact('cms','cmscatlists'));
    }
    
    public function editcms($id){
        $user = User::find(Auth::user()->id); 
        $id = base64_decode($id);
        $cms = [];

        $cmscatlists = cms_category::where('status', 1)
        ->orderBy('name')
        ->pluck('name','id');
        
        $cms = DB::table('cms_page')->where("id",$id)->first();
        // print_r($cms); exit;
        return view('Cms.editcms',compact('user','cms','cmscatlists'));
    }
    
    public function savecmsedit(Request $request,$id){
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
        
        DB::table('cms_page')->where("id",$id)->update($input);
        
        Session::flash('message', 'Cms page is successfully edited.');
        //return Redirect::back();
        return redirect('admin/listcms');
    }
    
    public function savecms(Request $request){
        $user = Auth::user()->id; 
        $input = request()->except(['_token']);
        
        if($request->input('status')){
            $input['status'] = 1;
        }else{
            $input['status'] = 0;
        }
        $input['created_at']= date('Y-m-d H:i:s');

        $input['slug'] = str_replace(' ', '-', strtolower($input['page_title']));

        // print_r($input); exit;
        DB::table('cms_page')->insert($input);
        
        Session::flash('message', 'Cms page is successfully added.');
        return redirect('admin/listcms');
    }
    
    public function deletecms($id){
        $user = Auth::user()->id; 
        $id = base64_decode($id);
        
        DB::table('cms_page')->where("id",$id)->delete();
       
        Session::flash('message', 'successfully deleted.');
        return redirect('admin/listcms');
        
    }

    public function viewcms($id){
        $cmspage = cms_page::with('cmscategory')
        ->where("id",base64_decode($id))
        ->first();
        // print_r($cmspage); exit;
        
        return view('Cms.viewcms',compact('cmspage'));
    }

}
