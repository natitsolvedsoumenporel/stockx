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
use App\attribute;
use App\attributemap;
use App\features;

class AttributeController extends Controller
{
    public function listattribute(){
        
        $all_attribute = attribute::with(['map','category'])->get()->toArray();  
        //$all_attribute = attributemap::with('features')->get()->toArray();  
        
        return view('Attribute.listattribute',compact('all_attribute'));
    }
    
    public function addattribute(){
        $attribute =array();
        $all_category = allcategory::pluck('category_name','cat_id');
        $all_features = features::pluck('feature_name','id');
        //print_r($all_features); exit;
        return view('Attribute.addattribute',compact('attribute','all_category','all_features'));
    }
    
    public function editattribute($attribute_id){
        $attribute_id = base64_decode($attribute_id);
        $attribute =array();
        $attribute = attribute::with(['map','category'])->where('attribute_id',$attribute_id)->first();
        $all_category = allcategory::pluck('category_name','cat_id');
        $all_features = features::pluck('feature_name','id');
        //print_r($attribute->toArray()); exit;
        return view('Attribute.editattribute',compact('attribute','all_category','all_features'));
    }
    
    public function saveattribute(Request $request){
        
        $input = request()->except(['_token','features']);
        $input['created_at']= date('Y-m-d H:i:s');
        $create_attribute_id = DB::table('attribute')->insertGetId($input);
        
        $data =[];
        $features = $request->input('features');
        foreach($features as $key => $val){
            $data['attrib_id'] = $create_attribute_id;
            $data['feature_id'] = $val;
           DB::table('attributemap')->insert($data); 
        }
        
        Session::flash('message', 'Attribute is successfully added.');
        return redirect('admin/listattribute');
    }
    
    public function saveattributeedit(Request $request,$atb_id){
        $attribute_id = base64_decode($atb_id);
        $input = request()->except(['_token','features']);
        $input['updated_at']= date('Y-m-d H:i:s');
        $create_attribute_id = DB::table('attribute')->where('attribute_id',$attribute_id)->update($input);
        
        $data =[];
        DB::table('attributemap')->where("attrib_id",$attribute_id)->delete();
        $features = $request->input('features');
        foreach($features as $key => $val){
            $data['attrib_id'] = $attribute_id;
            $data['feature_id'] = $val;
           DB::table('attributemap')->insert($data); 
        }
        
        Session::flash('message', 'Attribute is successfully updated.');
        return redirect('admin/listattribute');
    }
    
    public function deleteattribute($atb_id){
        //echo 1;exit;
        $atb_id = base64_decode($atb_id);
        DB::table('attributemap')->where("attrib_id",$atb_id)->delete();
        DB::table('attribute')->where("attribute_id",$atb_id)->delete();
        
        return redirect('admin/listattribute');
        
    }
}
