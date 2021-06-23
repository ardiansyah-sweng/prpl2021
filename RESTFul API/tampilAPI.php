<?php
    include "koneksi.php";

    $sql = "SELECT * FROM data_mahasiswa";
    $query = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_array($query)){
        $item[] = array(
            'NIM'=>$data["NIM"],
            'Nama'=>$data["Nama"],
            'Asal'=>$data["Asal"],
            'Jurusan'=>$data["Jurusan"]
        );
    }

    $response = array(
        'status'=>"OK",
        'data'=>$item
    );

    echo json_encode($response);
?>