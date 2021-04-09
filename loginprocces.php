<?php
//variable for save the post from form 
require_once("config.php");
session_start();
if(isset($_POST['login']))
{

    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek_user = mysqli_query($koneksi, "SELECT * FROM datas WHERE username = '$username'");
    $row = mysqli_num_rows($cek_user);

    if($row === 1){
        $fetch_pass = mysqli_fetch_assoc($cek_user);
        $cek_pass = $fetch_pass['password'];
        if($cek_pass <> $password){
            echo"<script>alert('Password Salah');</script>";
        }else{
            $_SESSION['username'] = true;
            echo"<script>alert('Login Berhasil');</script>";
            header("location: dashboard.php");
        }
    }else{
        echo"<script>alert('Username salah atau password belum terdaftar');</script>";
    }
}

