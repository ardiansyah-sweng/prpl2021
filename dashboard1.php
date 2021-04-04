<?php

require_once("signup1.php");

$sql_get = "SELECT * FROM prpl2021";
$query_dta = mysqli_query($koneksi, $sql_get);

$result = [];

// while($row = mysqli_fetch_assoc($query_dta)){
// 	$result[] = $row; 
// }

// var_dump($result);
// die;

?>

