<?php
$email     = $_POST['email'];
$pass     = $_POST['password'];

include 'koneksi.php';          //melakukan koneksi kedatabase

$cek = mysqli_query($connect, "select * from user  where email='$email' and password='$pass'");     //melakukan pengecekan apakah data terdapat didalam database atau tidak
$data = mysqli_num_rows($cek);

date_default_timezone_set('Asia/jakarta');          //Lokasi waktu
$log_his = date("y-m-d H:i:s");                     //Format Waktu

$query = mysqli_query($connect_history, "SELECT MAX(id) FROM log_history");  //MAX(id) yaitu memilih id paling tinggi 
$data = mysqli_fetch_assoc($query);
$id = $data['MAX(id)'];
$id = $id + 1;

$sql_insert = "INSERT INTO log_history VALUES('$id', '$email', '$log_his')";
mysqli_query($connect_history, $sql_insert);

if ($data > 0) {
    session_start();
    $row = mysqli_fetch_array($cek);
    $_SESSION['username'] = $email;

    echo "<script>alert('Selamat anda telah berhasil Login');
    window.location='dashbord.php'</script>";
} else {
    echo "<script>alert('Email Dan Password yang anda masukkan salah Silahkan ulangi!');
    window.location='index.php'</script>";
}
