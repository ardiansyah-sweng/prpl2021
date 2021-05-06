<?php 

    // Mmemanggil koneksi database
    include 'koneksi_db.php';

    session_start();
    // ini di gunakan untuk menandakan bahwa halaman ini memiliki sesi, jika dia belum login, maka tidak boleh untuk mengakses halaman ini

    // jika belum login, maka dashboard.php tidak bisa di akses
    // Fungsi di bawah ini digunakan untuk memvalidasi apakah sudah login atau belum
    if (empty($_SESSION['id_akunnya']) AND empty($_SESSION['email']) AND empty($_SESSION['nama_lengkap'])){
        header('location: logout.php');
        die();
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign-Up Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative">
        <h1>Selamat datang,<br><?= $_SESSION['nama_lengkap']; ?>!</h1>
        <h2>Email Anda: <?= $_SESSION['email']; ?></h2>
        <a href="logout.php" class="btn-get-started">LOGOUT <i class="fas fa-sign-out-alt"></i></a>
    </div>
</section>
<!-- End Hero -->
</body>
</html>