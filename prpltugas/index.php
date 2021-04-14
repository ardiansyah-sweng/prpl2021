<?php

require_once 'Auth.php';

if($auth->isLoggedIn()) {
 header('location:home.php');
}

if(isset($_POST['submit'])) {
 $username = $_POST['username'];
 $password = $_POST['password'];
 
 if($auth->login($username, $password)) {
  header('location:home.php');
 }
}
?>

<!DOCTYPE html>
<html>
<head>
 <title>Login</title>
 <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 <div class="login">
  <h1>Login</h1>

  <div style="text-align: center; color: #ff0000;">
   <span>
    
    <?php
     if(isset($_SESSION['error'])) {
      echo $_SESSION['error'];
     }
    ?>

   </span>
  </div>

  <form method="post">
   <label for="username">
    <i class="fas fa-user"></i>
   </label>
   <input type="text" name="username" placeholder="Username" id="username" required>
   <label for="password">
    <i class="fas fa-lock"></i>
   </label>
   <input type="password" name="password" placeholder="Password" id="password" required>
   <input type="submit" name="submit" value="Login">
  </form>
 </div>

</body>
</html>