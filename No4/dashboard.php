<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: signup.php");
}
?>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/cssqu.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="icon" type="icon/png" href="img/lego.ico">


  <title>Dashboard</title>
</head>

<body>
  <!-- Home -->
  <section class="home" id="home">
    <div class="container text-center">
      <h1>WELCOME</h1>
      <p><?php echo $_SESSION['username']; ?></p>
      <p class="msg">
        ✔ Success! Please check your email.
      </p>
      <p>Well done. By signing up, you've taken your first step to get specialy offer. <b>Please enjoy!</b></p><br>
      <p class="ex">Already have an account? <b><a href="signin.php">Sign In</a></b></p>
      <p class="ex">Check log history <b><a href="log_history.php">Goooo</a></b></p>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </div>
  </section>
</body>

</html>