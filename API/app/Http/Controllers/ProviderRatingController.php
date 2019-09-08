<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\ProviderRating;

class ProviderRatingController extends Controller
{
    public function show (Request $request) {
    	$provider_id = $request->query("provider_id");

    	$provider_rating = ProviderRating::where('provider_id', $provider_id)->select('ratings_no', 'rating_avg')->first();

    	$status = array("status" => false, "http_code" => 404);
    	if (isset($provider_rating)) {
    		$status["status"] = true;
    		$status["http_code"] = 200;
    	}

    	$data = array("provider_rating" => $provider_rating);

    	$response = array("status" => $status, "data" => $data);

    	return Response::json($response);
    }
}
