<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Rating;

class RatingController extends Controller
{
    public function store (Request $request) {
        // $client_id = $request['client_id'];  // not secure
    	$token = $request->header('token');
        $user_token = UserToken::whereRaw("BINARY `token`= ?",[$token])->first();
        $client_id = $user_token->user_id;

    	$provider_id = $request['provider_id'];
    	$stars_no = $request['stars_no'];
    	$comment = $request['comment'];

    	$rating = new Rating;
    	$rating->client_id = $client_id;
    	$rating->provider_id = $provider_id;
    	$rating->stars_no = $stars_no;
    	$rating->comment = $comment;

    	$result = $rating->save();

    	if ($result) {
            unset($rating->client_id);
            unset($rating->created_at);
            unset($rating->updated_at);

    		$response = (new UtilityController)->json_store($rating, "rating", true);
    	} else {
            $response = (new UtilityController)->json_store(null, "rating", false);
        }

    	return Response::json($response);
    }
}
