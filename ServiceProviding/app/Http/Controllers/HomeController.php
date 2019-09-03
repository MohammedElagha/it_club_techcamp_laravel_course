<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;

class HomeController extends Controller
{
    public function home () {
    	$numbers = DB::select("select (select count(id) from clients) as clients_no,
    							(select count(id) from providers) as providers_no,
    							(select count(id) from services) as services_no,
    							(select count(id) from categories) as categories_no
    							from user_types");

    	Log::info("Service No = " . $numbers[0]->services_no);

    	return view('home')->with('numbers', $numbers[0]);
    }
}
