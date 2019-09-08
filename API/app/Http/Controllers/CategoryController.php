<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    public function index () {
    	$category_icon_path = config('constants.category_icon');
    	$categories = Category::select('id', 'name', DB::raw("CONCAT('".$category_icon_path."', '/', icon) as icon"))->orderBy('created_at', 'DESC')->get();

    	$status = array("status" => false, "http_code" => 404);
    	if (count($categories) > 0) {
    		$status["status"] = true;
    		$status["http_code"] = 200;
    	}

    	// $categories = (array) $categories;	// Cause an error
    	$categories = json_decode(json_encode($categories), true);
    	$data = array("categories" => $categories);

    	$response = array("status" => $status, "data" => $data);

    	return Response::json($response);
    }
}
