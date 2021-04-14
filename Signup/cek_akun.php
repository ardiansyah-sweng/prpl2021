<?php
$email     = $_POST['email'];
$pass     = $_POST['password'];

include 'koneksi.php';

$cek = mysqli_query($connect, "select * from user  where email='$email' and password='$pass'");
$data = mysqli_num_rows($cek);


if ($data > 0) {
    session_start();
    $row = mysqli_fetch_array($cek);
    $_SESSION['username'] = $email;

    header("location: dashbord.php");
} else {
    echo "<script>alert('Email Dan Password yang anda masukkan salah Silahkan ulangi!');
    window.location='index.php'</script>";
}
