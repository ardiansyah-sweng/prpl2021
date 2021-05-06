<?php 
    session_start();
    include 'koneksi.php';
 
    // menangkap data yang dikirim dari form login
    $email = $_POST['email'];
    $pass = $_POST['pass'];
 
    // menyeleksi data pada tabel admin dengan username dan password yang sesuai
    $data = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email='$email' and pass='$pass'");
 
    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($data);
 
    if($cek > 0){
        $_SESSION['email'] = $email;
        $_SESSION['status'] = "login";
        header("location:Dashboard.php");
    }
    else{
        header("location:index.php?pesan=gagal");
    }
?>