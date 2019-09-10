<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public function services () {
    	return $this->hasMany('App\Service', 'provider_id');
    }

    public function ratings () {
    	return $this->hasMany('App\Rating', 'provider_id');
    }
}
