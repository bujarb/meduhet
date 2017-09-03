<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Need extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function city(){
      return $this->belongsTo('App\City');
    }

    public function category(){
      return $this->belongsTo('App\Category');
    }
}
