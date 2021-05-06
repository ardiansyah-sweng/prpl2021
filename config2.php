<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "thryarya9";
$db_name = "thry1900018266";

try {    
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    die("Terjadi masalah: " . $e->getMessage());
}
