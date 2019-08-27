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
}
