<?php
    include "conn.php";

    $sql = "SELECT * FROM pegawai";
    $query = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_array($query)){
        //echo $data["nama_pegawai"]." ";

        $item[] = array(
            'nama'=>$data["nama_pegawai"],
            'NIK'=>$data["NIK"],
            'alamat'=>$data["alamat"],
            'id'=>$data["id_pegawai"],
        );
    }

    $response = array(
        'status'=>'OK',
        'data'=>$item
    );

    echo json_encode($response);

?>