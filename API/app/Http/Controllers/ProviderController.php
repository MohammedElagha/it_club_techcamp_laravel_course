<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use Illuminate\Support\Facades\Response;

class ProviderController extends Controller
{
    public function show (Request $request) {
    	$provider_id = $request->query('provider_id');
    	$provider = Provider::where('id', $provider_id)->with('services')->with('ratings')->select('id', 'name')->first();

    	$response = (new UtilityController)->json_select(["provider" => $provider]);
    	return Response::json($response);
    }
}
