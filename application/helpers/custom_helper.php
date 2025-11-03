<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!function_exists('gettransaction')){
    function gettransaction(){
        $handle = curl_init();
        $url = "http://192.241.139.43:4000/getLatestTxn";
        // Set the url
        curl_setopt($handle, CURLOPT_URL, $url);
        // Set the result output to be a string.
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($handle);
        curl_close($handle);
        return $output ;
    }   
}