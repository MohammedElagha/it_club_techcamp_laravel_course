<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilityController extends Controller
{
	public function generate_random_string($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters_length = strlen($characters);
        $random_string = '';
        for ($i = 0; $i < $length; $i++) {
            $random_string .= $characters[rand(0, $characters_length - 1)];
        }
        return $random_string;
    }

    
    public function generate_unique_string($length, $data) {
        $random_string = '';

        $random_string = $this->generate_random_string($length);

        if(count($data) > 0){
            while(true){
                if(!in_array($random_string, array_values((array)$data))){
                    break;
                } else {
                    $random_string = $this->generate_random_string($length);
                }
            }
        }
        
        return $random_string;
    }


    public function json_select ($outputs) {
        $status = array("status" => false, "http_code" => 404);
        $arrays = array();

        if (count($outputs) > 0) {
            foreach ($outputs as $key => $output) {
                $arrays[$key] = $output;
                // array_push($arrays, [$key => $output]);

                if (count($output) > 0) {
                    $status["status"] = true;
                    $status["http_code"] = 200;
                }
            }
        }

        $response = array("status" => $status, "data" => $arrays);
        return $response;
    }


    public function json_store ($output, $output_name, $result) {
        $status = array("status" => false, "http_code" => 502);

        if ($result) {
            $status["status"] = true;
            $status["http_code"] = 201;
        }

        $data = array($output_name => $output);

        $response = array("status" => $status, "data" => $data);
        return $response;
    }


    public function json_update ($output, $output_name, $result) {
        $status = array("status" => false, "http_code" => 502);

        if ($result && !is_null($output)) {
            $status["status"] = true;
            $status["http_code"] = 200;
        } else if (!$result && !is_null($output)) {
            $status["status"] = false;
            $status["http_code"] = 502;
        } else {
            $status["status"] = false;
            $status["http_code"] = 404;
        }

        $data = array($output_name => $output);

        $response = array("status" => $status, "data" => $data);
        return $response;
    }
}
