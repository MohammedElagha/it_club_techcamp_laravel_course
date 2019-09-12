<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    public function index (Request $request) {
    	$last_index = $request->query('last_index');
    	$limit = $request->query('limit');

    	$offset = $last_index + 1;

    	$category_icon_path = config('constants.category_icon');
    	$categories = Category::select('id', 'name', DB::raw("CONCAT('".$category_icon_path."', '/', icon) as icon"))->orderBy('created_at', 'DESC')->limit($limit)->offset($offset)->get();

        $response = (new UtilityController)->json_select(["categories" => $categories]);

    	return Response::json($response);
    }
}
