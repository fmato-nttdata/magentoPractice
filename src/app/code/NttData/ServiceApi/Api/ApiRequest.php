<?php
namespace NttData\ServiceApi\Api;

class ApiRequest{
    /**
     * Get Pokemon data from API
     * 
     * @param int $limit
     * @return string
     */
    public function getRequestInfo($url, $request){

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $request,
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
