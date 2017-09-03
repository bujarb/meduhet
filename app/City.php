<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function product(){
    	return $this->hasMany('App\Product');
    }

    public function needs(){
      return $this->hasMany('App\Needs');
    }
}
