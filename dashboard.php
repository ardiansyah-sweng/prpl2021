<html>
<head>
    <title>index1</title>
    <link rel="stylesheet" type="text/css" href="hal.css">
</head>
<body>
    <div class="signin">
    <h2>Halaman Utama</h2><br><br>
    <?php 
        session_start();
        if($_SESSION['status']!="login"){
            header("location:../index.php?pesan=belum_login");
        }
    ?>
    <h3>Selamat datang, <?php echo $_SESSION['email']; ?></h3>
    <h4>anda telah login.
    <br/>
    <a href="logout.php">LOGOUT</a>
    </div>
</body>
</html>
