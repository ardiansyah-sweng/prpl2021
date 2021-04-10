<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>HALAMAN DASHBORD</title>
</head>
<body>
<br>
    <header>
        <h1>DASHBORD</h1>
    </header>

    <?php
        session_start();
        if (!isset($_SESSION['username'])) {
          header("Location: signup.php");
        }
    echo 'Selamat Datang, '. $_SESSION['username'];
    ?>
</body>
</html>