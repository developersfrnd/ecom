<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = array('id', 'created_at', 'updated_at');

    public function images(){
    	return $this->hasMany('App\Image');
    }

    public function supplier()
    {
        return $this->belongsToMany('App\Supplier')->withPivot('price','is_default')->withTimestamps();
    }

    public function project()
    {
        return $this->belongsToMany('App\Project');
    }

    public function catgeory()
    {
        return $this->belongsTo('App\Category');
    }
}
