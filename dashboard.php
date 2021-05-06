<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: signup.php");
}
echo 'Selamat Datang, '. $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    
</body>
</html>
