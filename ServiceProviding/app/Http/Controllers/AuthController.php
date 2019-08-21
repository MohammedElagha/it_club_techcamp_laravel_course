<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login_page () {
    	return view('login');
    }


    public function login (Request $request) {
    	// if (session()->has('id')) {
    	// 	return redirect()->back();
    	// }

    	$validatedData = $request->validate([
	        'username' => 'required',
	        'password' => 'required',
	    ]);

	    $admin = DB::table('admins')
	    		->join('admin_logins', 'admins.id', 'admin_logins.admin_id')
	    		->where('admin_logins.username', $request['username'])
	    		->whereNull('admins.deleted_at')
	    		->select('admins.id', 'admins.name', 'admins.email', 'admin_logins.password')
	    		->first();

	    if (isset($admin)) {
	    	if (Hash::check($request['password'], $admin->password)) {
	    		$admin_token_controller = new AdminTokenController();
	    		$token = $admin_token_controller->store($admin->id);



	    		session(["id" => $admin->id,
	    				"name" => $admin->name,
	    				"token" => $token]);

	    		return redirect('home');
	    	}
	    }

	    return redirect()->back();
    }

    public function logout () {
    	session()->flush();
    	return redirect('login');
    }
}
