<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserToken;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login (Request $request) {
    	$username = $request['username'];
    	$password = $request['password'];

    	$user = DB::table('users')
    			->join('user_logins', 'users.id', 'user_logins.user_id')
    			->where('user_logins.username', $username)
    			->select('users.id', 'users.phone', 'users.email', 'user_logins.password')
    			->first();

		if (isset($user)) {
			if (Hash::check($password, $user->password)) {
				$token = $this->token($user->id);

				$user->token = $token;
				unset($user->password);
				unset($user->id);
			}
		}

		return Response::json((new UtilityController)->json_select(["user" => $user]));
    }


    public function token ($user_id) {
    	$user_tokens = UserToken::select('token')->get();
    	$new_token = (new UtilityController)->generate_unique_string(60, $user_tokens);

    	$user_token = new UserToken;
    	$user_token->user_id = $user_id;
    	$user_token->token = $new_token;
    	$user_token->save();

    	return $new_token;
    }


    public function logout (Request $request) {
    	$token = $request->header('Token');
    	UserToken::whereRaw("BINARY `token`= ?",[$token])->delete();
    }
}
