<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminToken;
use Illuminate\Support\Facades\DB;

class AdminTokenController extends Controller
{
    public function generate_token ($length) {
    	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
    }


    public function check_token ($token) {
    	$count = AdminToken::where(DB::raw('BINARY `token`'), $token)->count();

    	if ($count > 0) {
    		return false;
    	} else {
    		return true;
    	}
    }


    public function store ($admin_id) {
    	while (true) {
    		$random_token = $this->generate_token(30);

    		if ($this->check_token($random_token)) {
    			$admin_token = new AdminToken();
    			$admin_token->admin_id = $admin_id;
    			$admin_token->token = $random_token;
    			$result = $admin_token->save();

    			if ($result) {
    				return $random_token;
    			}
    		}
    	}
    }
}
