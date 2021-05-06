//* UTS PRPL *//
//* Nama  : Muhammad Nauval Fauzi Khatullah *//
//* Nim   : 1900018179 *//
//* Kelas : D *//
//* Soal Ke 4 *//

<?php
session_start();
include_once('db_connect.php');
$database = new database();
 
if(isset($_SESSION['is_login']))
{
    header('location:home.php');
}

if(isset($_POST['login']))
{
    $email    = $_POST['email'];
    $password = $_POST['password'];
    if(isset($_POST['remember']))
    {
      $remember = TRUE;
    }
    else
    {
      $remember = FALSE;
    }
 
    if($database->login($email,$password,$remember))
    {
      header('location:home.php');
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Sign In Form</title>
  </head>
  <body class="text-center">
    <form class="form-signin" method="post" action="">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="email" class="sr-only">Email</label>
  <input type="text" id="email" class="form-control" placeholder="email" name="email" required autofocus>
  <label for="password" class="sr-only">Password</label>
  <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me" name="remember"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign In</button>
  <a href="register.php" class="btn btn-lg btn-success btn-block">Sign Up</a>
</form>
</body>
</html>