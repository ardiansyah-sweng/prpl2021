<?php
include('koneksi.php');

$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

$array = array();
if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_array($result)) {
        $data = array(
            'id' => $row['id'],
            'nama' => $row['nama'],
            'nim' => $row['nim'],
            'alamat' => $row['alamat'],
        );
        array_push($array, $data);
    }
}

echo json_encode($array);