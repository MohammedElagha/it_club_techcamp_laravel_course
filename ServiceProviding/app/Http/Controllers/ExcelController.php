<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Category;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelController extends Controller
{
    public function categories () {
    	$categories = Category::all();

    	$arr = array();
    	array_push($arr, ["id", "name"]);
    	foreach ($categories as $key => $category) {
    		array_push($arr, [$category->id, $category->name]);
    	}

    	Excel::create('categories', function($excel) use($arr) {
    		$excel->sheet('data', function($sheet) use($arr) {
                $sheet->fromArray($arr, null, 'A1', false, false);
            });
    	})->export('xls');
    }
}
