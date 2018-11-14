<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attributemap extends Model
{
    protected $table = 'attributemap';
    
    public function features(){
        return $this->hasMany(
                'App\features',
                'id',
                'feature_id'
                );
    }
//    public function features(){
//        return $this->belongsTo(
//                'App\features',
//                'feature_id',
//                'id'
//                );
//    }
}
