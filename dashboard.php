<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: signup.php");
}
echo 'Welcome, '. $_SESSION['username'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <title>Dashboard</title>
</head>
<body>
    
</body>
</html>