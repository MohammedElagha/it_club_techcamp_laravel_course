<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function user_group_sections () {
    	return $this->hasMany('App\UserGroupSection');
    }

    public function subsections () {
    	return $this->hasMany('App\Subsection');
    }
}
