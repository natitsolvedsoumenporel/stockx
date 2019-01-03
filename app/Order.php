<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    
    public function userdetails(){
        // return $this->belongsTo('App\User', 'foreign_key', 'other_key');
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function productdetails(){
        // return $this->belongsTo('App\User', 'foreign_key', 'other_key');
        return $this->belongsTo('App\Product', 'product_id', 'product_id');
    }
}