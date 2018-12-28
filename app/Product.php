<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    
    public $fetch_all_cat = array();
    
    
    public function parentcategory(){
        return $this->belongsTo(
                'App\allcategory',
                'cat_id',
                'cat_id'
                );
    }
    public function childcategory(){
        return $this->belongsTo(
                'App\allcategory',
                'subcat_id',
                'cat_id'
                );
    }
    public function brandname(){
        // return $this->belongsTo('App\User', 'foreign_key', 'other_key');
        return $this->belongsTo('App\Brand', 'brand_id', 'id');
    }
    public function colorname(){
        return $this->belongsTo('App\Color', 'color_id', 'id');
    }
    public function sizetypename(){
        return $this->belongsTo('App\size', 'size_type', 'id');
    }
    public function imagepath()
    {
        // return $this->hasMany('App\Model', 'foreign_key', 'local_key');
        return $this->hasMany('App\product_image', 'p_id', 'product_id');
        
    }


    
    
}
