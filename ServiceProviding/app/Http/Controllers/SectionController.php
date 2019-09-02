<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    public function index () {
    	$user_group_id = session('user_group_id');

    	$sections = DB::table('sections')
    			->join('user_group_sections', 'sections.id', 'user_group_sections.section_id')
    			->where('user_group_sections.user_group_id', $user_group_id)
    			->select('sections.id', 'sections.name')
    			->get();

    	return $sections;
    }
}
