<?php 
//menampilkan data dari api datadase di lokalhost saya.
include "No4_db_conn.php"; 

$sql = "SELECT * FROM users";
$query = mysqli_query($conn, $sql);
while($data = mysqli_fetch_array($query)){
    $item[] = array(
        'id' => $data['id'],
        'name' => $data["name"],
        'email'=> $data["email"],
        'pass'=> $data["pass"]
    );
}
$response = array(
    'status_data'=> 'hasil',
    'data'=> $item
);

echo json_encode($response);

?>