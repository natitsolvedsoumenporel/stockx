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
use App\Brand;
use App\Color;
use App\numbersize;
use App\size;
use App\Product;
use App\product_image;
class ProductController extends Controller
{
    public function listproduct(){
        
        // $all_product = Product::get()
        // ->with('imagepath')
        // ->toArray();
        $all_product = Product::with('imagepath','parentcategory')
   		->orderByDesc('product_id')
   		->get()
   		->toArray();
        // print_r($all_product); exit;
        return view('Product.listproduct',compact('all_product'));
    }
    
    public function addproduct(){
        $product =array();
        $brandlists = Brand::where('is_active', 1)
        ->orderBy('brand_name')
        ->pluck('brand_name','id');

        $catlists = allcategory::where('is_active', 1)
        ->where('parent_id', 0)
        ->orderBy('category_name')
        ->pluck('category_name','cat_id');

        $colorlists = Color::where('is_active', 1)
        ->orderBy('color_name')
        ->get();
        // print_r($colorlists); exit;

        $sizetypelists = size::orderBy('id')
        ->pluck('size_name','id');
        $sizelists = numbersize::where('size_type_id', 1)
        ->orderBy('id')
        ->get();
        
        return view('Product.addproduct',compact('product', 'brandlists', 'catlists', 'colorlists', 'sizetypelists', 'sizelists'));
    }
    
    public function editproduct($product_id){
        $user = User::find(Auth::user()->id); 
        $product_id = base64_decode($product_id);
        $product = [];

        $brandlists = Brand::where('is_active', 1)
        ->orderBy('brand_name')
        ->pluck('brand_name','id');

        $catlists = allcategory::where('is_active', 1)
        ->where('parent_id', 0)
        ->orderBy('category_name')
        ->pluck('category_name','cat_id');

        $colorlists = Color::where('is_active', 1)
        ->orderBy('color_name')
        ->get();

        $sizetypelists = size::orderBy('id')
        ->pluck('size_name','id');
        
        $product = DB::table('products')->where("product_id",$product_id)->first();

        if ($product->size_type != '') {
            $sizelists = numbersize::where('size_type_id', $product->size_type)
            ->orderBy('id')
            ->get()
            ->toArray();
        } else {
            $sizelists = numbersize::where('size_type_id', 1)
            ->orderBy('id')
            ->get()
            ->toArray();
        }
        

        $get_all_subcat = allcategory::where("parent_id",$product->cat_id)
        ->orderBy('cat_id')
        ->pluck('category_name','cat_id');
        // print_r($sizelists); exit;
        return view('Product.editproduct',compact('user','product', 'brandlists', 'catlists', 'colorlists','sizetypelists','sizelists','get_all_subcat'));
    }
    
    public function editproductsave(Request $request,$product_id){
        $user = Auth::user()->id; 
        $input = request()->except(['_token']);
        $product_id = base64_decode($product_id); 
        unset($input['image']);

        if(!empty($input['color_id'])){  
            $get_color = implode(",",$input['color_id']);
            $input['color_id'] = $get_color;
        }

        if(!empty($input['size'])){
            $get_size = implode(",",$input['size']);
            $input['size'] = $get_size;
        }
        
        if($request->input('is_active')){
            $input['is_active'] = 1;
        }else{
            $input['is_active'] = 0;
        }
        $input['updated_at']= date('Y-m-d H:i:s');
        
        // print_r($input); exit;

        if(DB::table('products')->where("product_id",$product_id)->update($input)){
            if ($request->hasFile('image')) {
                DB::table('product_image')->where("p_id",$product_id)->delete();
                foreach($request->file('image') as $file){
                    $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
                    $file->move('images/products/', $name);

                    $data['p_id'] = $product_id;
                    $data['originalpath'] = 'images/products/'.$name;
                    $data['created_at']= date('Y-m-d H:i:s');
                    DB::table('product_image')->insert($data); 
                }
                Session::flash('message', 'Product is successfully edited.'); 
            }
        }
        
        // Session::flash('message', 'Product is successfully edited.');
        //return Redirect::back();
        return redirect('admin/listproduct');
    }




    public function addproductsave(Request $request){
        $user = Auth::user()->id; 
        $input = request()->except(['_token']);
        unset($input['image']);
        
        if(!empty($input['color_id'])){  
            $get_color = implode(",",$input['color_id']);
            $input['color_id'] = $get_color;
        }

        if(!empty($input['size'])){
            $get_size = implode(",",$input['size']);
            $input['size'] = $get_size;
        }
        
        if($request->input('is_active')){
            $input['is_active'] = 1;
        }else{
            $input['is_active'] = 0;
        }
        
        $input['created_at']= date('Y-m-d H:i:s');
        $input['pro_uni_id'] = uniqid();
         // print_r($input); exit;
        if (DB::table('products')->insert($input)) {
        	$id = DB::getPdo()->lastInsertId();
        	if ($request->hasFile('image')) {
	            foreach($request->file('image') as $file){
	                $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
	                $file->move('images/products/', $name); 
	                $data['p_id'] = $id;
	                $data['originalpath'] = 'images/products/'.$name;
	                $data['created_at']= date('Y-m-d H:i:s');
	                DB::table('product_image')->insert($data); 
		        }
	           	Session::flash('message', 'Product is successfully added.'); 
	        }
        } else{
        	Session::flash('message', 'Product is could not save.');
        }
        return redirect('admin/listproduct');
    }
    
    public function deleteproduct($product_id){
        $user = Auth::user()->id; 
        $product_id = base64_decode($product_id); 
        
        DB::table('products')->where("product_id",$product_id)->delete();
        $productimage = product_image::where("p_id",$product_id)
        ->get()
        ->toArray();
        foreach($productimage as $pimage){
            $file_path = $pimage['originalpath'];
            unlink($file_path);
        }
        DB::table('product_image')->where("p_id",$product_id)->delete();
       
        Session::flash('message', 'successfully deleted.');
        return redirect('admin/listproduct');
        
    }

    public function viewproduct($product_id){
        // $product = Product::find("product_id",base64_decode($product_id))->toArray();
        $product = Product::with('imagepath','parentcategory','childcategory','brandname','sizetypename')
        ->where("product_id",base64_decode($product_id))
        ->first();
        // print_r($product); exit;
        
        return view('Product.viewproduct',compact('product'));
    }

    public function get_subsizelist(Request $request){
        $data = array();
        $size_type_id = $request->input('size_type_id');
        //$condition = array();
        $get_all_size = numbersize::where("size_type_id",$size_type_id)->get();
        //print_r($get_all_size); exit;
    
        
        if(!empty($get_all_size)){
            
            $html ="";
            foreach($get_all_size as $subcatKey => $subsizeVal){
                $html .= '<input class="" name="size[]" type="checkbox" multiple="multiple" value="'.$subsizeVal['size_number'].'">  '.$subsizeVal['size_number'].'  &nbsp;&nbsp;';
                
            }
            $data['ack'] = 1;
            $data['htm'] = $html;
        }else{
            $data['ack'] = 0;
            $data['htm'] = "";
        }
       
        echo json_encode($data); exit;
    }
}
