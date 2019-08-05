<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function add_form () {
    	return view('form.add_form');
    }

    public function handle_add_form (Request $request) {
    	// $get_param = $request->query('');	// GET
    	// $post_data = $request[''];	// POST

    	$status = false;
    	$email_pattern = "[a-zA-z0-9.-]+\@[a-zA-z0-9.-]+.[a-zA-Z]+";

    	if ($request->has('name') && $request->has('phone') && $request->has('email')) {
    		if (!empty($request['name']) && !empty($request['phone']) && !empty($request['email'])) {
    			if (strlen($request['name']) > 5 
    				&& ctype_digit($request['phone'])
    				&& preg_match($email_pattern, $request['email']), $match) {

    				$status = true;
    			}
    		}
    	}

    	return redirect('form/view/add')->with('add_status', $status);
    }
}
