//* UTS PRPL *//
//* Nama  : Muhammad nauval Fauzi Khatullah *//
//* Nim   : 1900018179 *//
//* Kelas : D *//
//* Soal Ke 6 *//

<?php

 $url = "https://gis.dukcapil.kemendagri.go.id/arcgis/rest/services/Hosted/Rasio_Kerentanan_Penduduk_Indonesia_terhadap_COVID19_Provinsi/FeatureServer/0";

 $client = curl_init($url);
 curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
 $response = curl_exec($client);

 $result = json_decode($response);


 $total = $result->features[0]->attributes->Total;

 $unix_timestamp = $result->features[0]->attributes->Last_Update;
 $Last_Update = date("l d F Y, H:i:s", substr($unix_timestamp, 0, 10)); // 13 digit epoch time to date conversion


 echo "Total Penduduk : ".$total;
 echo "<br>";
?> 