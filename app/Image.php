<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = array('id', 'created_at', 'updated_at');

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
