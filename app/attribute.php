<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attribute extends Model
{
    protected $table = 'attribute';
    
    public function map(){
        return $this->hasMany(
                'App\attributemap',
                'attrib_id',
                'attribute_id'
                );
    }
    public function category(){
        return $this->belongsTo(
                'App\allcategory',
                'category_id',
                'cat_id'
                );
    }
}
