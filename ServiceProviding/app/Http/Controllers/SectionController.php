<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Section;

class SectionController extends Controller
{
    public function index () {
    	$user_group_id = session('user_group_id');

    	$sections = DB::table('sections')
    			->join('user_group_sections', 'sections.id', 'user_group_sections.section_id')
    			->where('user_group_sections.user_group_id', $user_group_id)
    			->select('sections.id', 'sections.name')
    			->get();

    	foreach ($sections as $key => $section) {
    		$section->subsections = Section::find($section->id)->subsections;
    	}

    	return $sections;
    }

    public function check ($url) {
    	$user_group_id = session('user_group_id');

    	$subsections = DB::table('subsections')
    				->join('user_group_sections', 'subsections.section_id', 'user_group_sections.section_id')
    				->where('user_group_sections.user_group_id', $user_group_id)
    				->select('subsections.alias_name')
    				->get();

    	foreach ($subsections as $key => $subsection) {
    		if (strpos($url, $subsection->alias_name) !== false) {
    			return true;
    		}
    	}

    	return false;
    }
}
