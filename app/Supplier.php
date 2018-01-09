<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsToMany('App\Product')->withPivot('price','is_default')->withTimestamps();
    }
}
