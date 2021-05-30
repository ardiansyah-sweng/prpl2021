<?php 

    // Mmemanggil koneksi databas 
    include 'functions/koneksi.php';

    session_start();
    // ini di gunakan untuk menandakan bahwa halaman ini memiliki sesi, jika dia belum login, maka tidak boleh untuk mengakses halaman ini

    // jika belum login, maka dashboard.php tidak bisa di akses
    // Fungsi di bawah ini digunakan untuk memvalidasi apakah sudah login atau belum
    if (empty($_SESSION['id_akun']) AND empty($_SESSION['email']) AND empty($_SESSION['password'])){
        echo "<script>alert('You don't have access to this place!'); window.location = 'logout.php'</script>"; // jika belum login akan di arahkan ke halaman logout.php
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">

    <title>Dashboard</title>

    <link rel="icon" href="images/icon.png">

    <link rel="stylesheet" href="plugins/css/bootstrap.css">
    <link rel="stylesheet" href="plugins/css/font-awesome.min.css">
</head>

<body class="bg-light">

    <section class="container mt-4">
        <div class="row justify-content-center mt-4">
            <div class="jumbotron mt-4">
                <h1 class="display-4">Hello, <?= $_SESSION['email']; ?>!</h1>
                <p class="lead">This is the dashboard page</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <hr class="my-4">
                <p>if you want to logout, please click the button below!</p>
                <a class="btn btn-primary btn-lg" href="logout.php" role="button"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
        </div>
    </section>

    <script src="plugins/js/jquery.min.js"></script>
    <script src="plugins/js/popper.js"></script> 
    <script src="plugins/js/bootstrap.min.js"></script>

    <script type="text/javascript">

        // Popover
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
        });
        // Popover

    </script>

</body>
</html>