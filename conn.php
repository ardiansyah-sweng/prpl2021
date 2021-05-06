<?php
//UTS6
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "uts_no6";

    $conn = mysqli_connect($servername, $username, $password, $databasename);
    if(!$conn){
        die("Koneksi tidak berhasil");
    }
?>
