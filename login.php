<?php 
session_start();
include_once('koneksi.php');
$database = new database();

if(isset($_SESSION['is_login']))
{
    header('location:dashboard.php');
}

if(isset($_COOKIE['username']))
{
  $database->relogin($_COOKIE['username']);
  header('location:dashboard.php');
}

if(isset($_POST['login']))
{
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    if (empty($email)){
        header("Location: login.php?error=User email is required");
    exit();
    }else if(empty($password)){
        header("Location: login.php?error=Password is required");
    exit();
    }else{
        $password = md5($password); 
        $sql = "SELECT * FROM users WHERE email='$email' AND pass='$password'";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)===1){
            $row = mysqli_fetch_assoc($result);

            if($row['email']===$email && $row['pass']===$password){
                $_SESSION['email']= $row['email'];
                $_SESSION['nama']= $row['nama'];
                $_SESSION['id']= $row['id'];
                header("Location: dashboard.php");
            }
            else{
                header("Location: login.php?error=Incoreect Username or Password");
                exit();      
            }
        }else{
            header("Location: login.php?error=Incoreect Username or Password");
            exit();
        }
    }
}else{
    header("Location: dashboard.php");
    exit();
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Login Form</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" method="post" action="">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="email" class="sr-only">Email</label>
  <input type="email" id="email" class="form-control" placeholder="Email" name="email" required autofocus><br>
  <label for="password" class="sr-only">Password</label>
  <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
  <div class="checkbox mb-3">
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
  <a href="signup.php" class="btn btn-lg btn-success btn-block">Register</a>
</form>
</body>
</html>