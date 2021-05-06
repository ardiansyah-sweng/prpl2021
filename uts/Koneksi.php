<?php

$host="localhost";
$user="root";
$password="";
$db="sign";

$kon = mysqli_connect($host,$user,$password);


$hasil=mysqli_select_db($kon,$db);



?>