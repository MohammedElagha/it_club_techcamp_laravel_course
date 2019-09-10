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

        $response = (new UtilityController)->json_select(["categories" => $categories]);

    	return Response::json($response);
    }
}
