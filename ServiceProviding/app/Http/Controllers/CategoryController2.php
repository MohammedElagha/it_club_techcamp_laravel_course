<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;
class CategoryController2 extends Controller
{
    public function generate_category_icon_name ($icon) {
    	$category_icons = Category::select(DB::raw("LEFT(icon, LENGTH(icon) - LOCATE('.', REVERSE(icon)))"))->get();
        $icon_name = (new UtilityController)->generate_unique_string(60, $category_icons) . '.' . $icon->getClientOriginalExtension();
        return $icon_name;
    }


    public function upload_category_icon ($icon, $icon_name) {
    	$path = storage_path('categories_icons');
    	$icon->move($path, $icon_name);
    }
}
