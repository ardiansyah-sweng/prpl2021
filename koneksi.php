<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tugas1";
    
    $koneksi = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal terhubung ke database');
?>