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
    public function imagepath()
    {
        return $this->hasMany('App\Models\product_image','p_id');
    }
    
    
}
