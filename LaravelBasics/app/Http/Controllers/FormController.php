<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function add_form () {
    	return view('form.add_form');
    }

    public function handle_add_form (Request $request) {
    	// work

    	return redirect('form/view/add')->with('add_status', true);
    }
}
