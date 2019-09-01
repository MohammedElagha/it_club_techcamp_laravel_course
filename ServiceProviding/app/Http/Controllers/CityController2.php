<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CityController2 extends Controller
{
    public function cities_of_country ($id) {
    	return view('country.cities')->with('id', $id);
    }


    public function get_cities_of_country (Request $request) {
    	$country_id = $request->query('country_id');

    	$cities = Country::find($country_id)->cities;

    	return $cities;
    }
}
