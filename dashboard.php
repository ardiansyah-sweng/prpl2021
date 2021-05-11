<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="css/dashboard.css">

    <title>Dashboard - buelat.</title>
</head>
<body>

    <header>
      <div class="head-container">
        <div class="head-logo">
           <a href="dashboard.php" class="head-brand">
             <img src="images/logo.png" alt="">
           </a>
        </div>
        <div class="nav">
            <a href="dashboard.php" class="nav-item active">Home</a>
            <a href="userlog.php" class="nav-item">SignIn History</a>
            <a href="#" class="nav-item">Contact</a>
            <a href="logout.php" class="nav-item logout">Logout</a>
        </div>
      </div>
    </header>

    <section>
        <div class="content">
            <h1>Welcome,</h1>
            <p><?= $_SESSION['username'] ?></p>
        </div>
    </section>
    
</body>
</html>