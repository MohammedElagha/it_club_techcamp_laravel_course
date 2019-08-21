<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminToken;
use Illuminate\Support\Facades\DB;

class AdminTokenController extends Controller
{
    public function store ($admin_id) {
    	$admin_token_controller_2 = new AdminTokenController2;
    	while (true) {
    		$random_token = $admin_token_controller_2->generate_token(30);

    		if ($admin_token_controller_2->check_token($random_token)) {
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


    public function destroy ($admin_id) {
    	AdminToken::where('admin_id', $admin_id)->delete();
    }
}
