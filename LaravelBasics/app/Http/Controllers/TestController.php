<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test () {
    	$value = "Mohammed";

    	$names = array("Mohammed", "Ahmed", "Omar", "Soso");

    	return view('test')->with('value', $value)->with('names', $names);
    }


    public function index () {
    	return view('template.index');
    }
}
