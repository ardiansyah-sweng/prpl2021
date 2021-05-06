<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'db_apipublik';

$connect = mysql_connect($host, $user, $pass, $db) or die(mysql_connect());

$query = "SELECT * FROM data";
$sql = mysql_query($connect, $query);

$output = array();

while($row = mysqli_fetch_assoc($sql)){
    $output[] = $row;
}

header('Contect-Type : application/json');
echo json_encode($output);