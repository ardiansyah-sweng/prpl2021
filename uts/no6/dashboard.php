<?php
include 'coronaAPI.php';

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../no4/signup.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">

    <title>Dashboard - buelat.</title>
</head>
<body>

    <header>
      <div class="head-container">
        <div class="head-logo">
           <a href="#" class="head-brand">
             <img src="../images/logo.png" alt="">
           </a>
        </div>
        <div class="nav">
            <a href="#" class="nav-item active">Home</a>
            <a href="#" class="nav-item">Features</a>
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

        <div class="covid-container">
          <h2>Update Covid Indonesia</h2>
          <div class="covid-data">
            <div class="covid positif">
              <p>Total Positif</p>
              <p class="angka"><?= $positif ?></p>
              <p>orang</p>
            </div>
            <div class="covid sembuh">
              <p>Total Sembuh</p>
              <p class="angka"><?= $sembuh ?></p>
              <p>orang</p>
            </div>
            <div class="covid meninggal">
              <p>Total Meninggal</p>
              <p class="angka"><?= $meninggal ?></p>
              <p>orang</p>
            </div>
          </div>
         
        </div>
        
    </section>
    
</body>
</html>