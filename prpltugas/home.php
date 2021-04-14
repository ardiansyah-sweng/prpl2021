<?php

require_once 'Auth.php';

if(!$auth->isLoggedIn()) {
 header('location:index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
 <title>Home</title>
 <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 <center>
  <h3>Selamat datang <?= $_SESSION['username']; ?></h3>
  <label for="logout">
   <i class="fas fa-sign-out-alt"></i>
  </label>
  <a href="logout.php" style="text-decoration: none;">Logout</a>
 </center>
</body>
</html>