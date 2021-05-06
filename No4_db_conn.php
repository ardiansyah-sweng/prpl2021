<?php
$sname= "localhost"; //web server
$unmae= "root"; //user database
$password= ""; //password database

$db_name= "testsingup"; //nama database yang dibuat

$conn = mysqli_connect($sname, $unmae , $password, $db_name); //melakukan koneksi ke database

if(!$conn){ //apabila koneksi database gagal
    echo "Connection failed!";
}
?>