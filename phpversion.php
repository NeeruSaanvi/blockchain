<?php
 // phpinfo() 

// echo '<pre>';
// var_dump(curl_version());
// echo '</pre>';

echo (getLatestTxn());

function getLatestTxn(){
    $handle = curl_init();
    $url = "http://localhost:4000/getLatestTxn";
    // Set the url
    curl_setopt($handle, CURLOPT_URL, $url);
    // Set the result output to be a string.
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($handle);
    curl_close($handle);    
    return $output;    
}

?>

