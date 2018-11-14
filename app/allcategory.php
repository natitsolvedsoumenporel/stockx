<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class allcategory extends Model
{
    protected $table = 'allcategory';
    
    public function childcategory(){
        return $this->hasMany(
                'App\allcategory',
                'parent_id',
                'cat_id'
                );
    }
    public function parentcategory(){
        return $this->belongsTo(
                'App\allcategory',
                'parent_id',
                'cat_id'
                );
    }
}
