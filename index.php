<?php

session_start();

include("auth/auth.php");

$user = new database();

if (!$_SESSION['login'] === true) {
    header(("location: login.php"));
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>DASHBOARD</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <br />
    <br />
    <center>
        <h1>SELAMAT DATANG</h1>
        <a href="logout.php" class="btn btn-primary mt-3">Logout</a>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>