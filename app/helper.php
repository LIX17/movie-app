<?php
    function http_request($url){
        // initialize curl
        $curl = curl_init(); 

        // set url 
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('API_BASE_URL').$url."?api_key=".env('API_KEY','')."&language=en-US",
            CURLOPT_RETURNTRANSFER => true,              
            CURLOPT_TIMEOUT        => 120,
		));
        
        $response = curl_exec($curl); 

        // close curl 
        curl_close($curl);      

        // return response
        return $response;
    }

    function upper($slug)
    {
        $slug = explode('_', $slug);        
        $slug = array_map('ucfirst', $slug);
        $slug = join(' ', $slug);

        return $slug;
    }
?>