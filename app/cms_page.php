<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cms_page extends Model
{
    protected $table = 'cms_page';

    public function cmscategory(){
        // return $this->belongsTo('App\User', 'foreign_key', 'other_key');
        return $this->belongsTo('App\cms_category', 'cms_cat_id', 'id');
    }
}
