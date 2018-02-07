<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = array('id', 'updated_at');

    public function product(){
    	return $this->belongsTo('App\Product');
    }

    public function project(){
    	return $this->belongsTo('App\Project');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
