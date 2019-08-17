<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function select_all_students () {
    	$students = DB::select("select * from students");

    	return view('student.view_all')->with('students', $students);
    }

    public function select_one_student ($id) {
    	$students = DB::select("select * from students
    							where id = " . $id);

    	$student = null;

    	if (count($students) > 0) {
    		$student = $students[0];
    	}

    	return view('student.view_one')->with('student', $student);
    }
}
