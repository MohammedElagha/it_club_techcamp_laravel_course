<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    public function country () {
    	return $this->belongsTo('App\Country', 'country_id');
    }
}
