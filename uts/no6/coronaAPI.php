<?php

function ambil_url($url){
    $client=curl_init($url);
    curl_setopt($client,CURLOPT_SSL_VERIFYHOST,0);
    curl_setopt($client,CURLOPT_SSL_VERIFYPEER,0);
    curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
    $response=curl_exec($client);
    return json_decode($response);
}

$url_indo="https://api.kawalcorona.com/indonesia/";
$result=ambil_url($url_indo);
$positif=$result[0]->positif;
$meninggal=$result[0]->meninggal;
$sembuh=$result[0]->sembuh;

?>