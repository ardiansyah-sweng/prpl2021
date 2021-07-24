
<?php

try {

    $con = new PDO('mysql:host=localhost; dbname=tbauth', 'root', '', array(PDO::ATTR_PERSISTENT => true));
} catch (PDOException $e) {

    echo $e->getMessage(); //menghubungkan database 
}

include_once 'AuthClass.php';

$user = new Auth($con);
