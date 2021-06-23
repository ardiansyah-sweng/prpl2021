<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "data_mahasiswa";

    $conn = mysqli_connect($servername, $username, $password, $databasename);
    if(!$conn){
        die("Koneksi Gagal");
    }
?>