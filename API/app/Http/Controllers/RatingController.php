<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Rating;

class RatingController extends Controller
{
    public function store (Request $request) {
    	$client_id = $request['client_id'];
    	$provider_id = $request['provider_id'];
    	$stars_no = $request['stars_no'];
    	$comment = $request['comment'];

    	$rating = new Rating;
    	$rating->client_id = $client_id;
    	$rating->provider_id = $provider_id;
    	$rating->stars_no = $stars_no;
    	$rating->comment = $comment;

    	$result = $rating->save();

    	$status = array("status" => false, "http_code" => 502);
    	if ($result) {
    		$status["status"] = true;
    		$status["http_code"] = 201;
    	}

    	unset($rating->client_id);
    	unset($rating->created_at);
    	unset($rating->updated_at);
    	$data = array("rating" => $rating);

    	$response = array("status" => $status, "data" => $data);
    	return Response::json($response);
    }
}
