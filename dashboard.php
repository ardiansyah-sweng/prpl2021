<?php
// session_start();
// if (!isset($_SESSION['username']) && isset($_SESSION['email'])) {
//     header("Location: signup.php");
// }
// echo 'Welcome, '. $_SESSION['name'];

//  menangkap data id dan email user
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['email'])){

?>
  <!-- membuat program dashbord-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />

    <title>Menu Utama</title>
  </head>
  <style>
  /* seting CSS pada program dashbord.php */
    h1 {
      text-align: center;
      color: #fff;
    }
    a {
      float: right;
      background: #555;
      padding: 10px 15px;
      color: #fff;
      border-radius: 5px;
      margin-right: 10px;
      border: none;
      text-decoration: none;
    }
    a:hover {
      opacity: 0.7;
    }
  </style>
  <body>
  <!-- menampilkan nama pengunjung setelah berhasil login -->
    <h3>Hallo , <?php echo $_SESSION['name']; ?> </h3>
    <a href="logout.php">logout</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
  <?php
}else{
    header("Location: No4_signup.php");
    exit();
}
?>
</html>
