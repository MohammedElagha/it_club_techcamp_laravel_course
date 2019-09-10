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

        $response = (new UtilityController)->json_select(["provider_rating" => $provider_rating]);
    	return Response::json($response);
    }
}
