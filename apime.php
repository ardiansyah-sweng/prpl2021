<?php
    //UTS6
    //koneksi ke database mysql
    include "con.php";

    //membuat query/sql untuk mengambil seluruh data karyawan
    $sql = "SELECT * FROM karyawan";
    $query = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_array($query)){
        echo $data["nama_karyawan"]." ";
    }
?>