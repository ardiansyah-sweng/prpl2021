<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styletugas.css">
    <title>HALAMAN DASHBORD</title>
</head>
<body>
    <center>
<br>
    <header>
        <h1>DASHBORD</h1>
    </header>

    <?php
        session_start();
        if (!isset($_SESSION['username'])) {
          header("Location: signuptugas.php");
        } 
    echo 'Selamat Datang :)';
    ?>
    </center>
</body>

<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: signuptugas.php");
}
echo 'Welcome, '. $_SESSION['username'];
echo 'Welcome, '. $_SESSION['username'];
?>
</html> 