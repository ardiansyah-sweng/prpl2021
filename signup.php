<?php

$email= "";
$pass = "";
$passErr = "";
$panjang_pass = true;
$panjang_pass_msg = "";
$panjang_pass1 = true;
$panjang_pass_msg1 = "";

// include 'koneksi.php';

if (ISSET($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = ($_POST['password']);
    
    if (empty($email) || empty($pass)) {
        return 'Username or password is empty!';
    }

    session_start();
    $_SESSION['username'] = $email;

    if(strlen($pass)<6){
          $panjang_pass = false;
          $panjang_pass_msg = "Your password Must Contain At Least 6 Characters!";
    }
    if (!preg_match("#[0-9]+#", $pass) && !preg_match("#[A-Z]+#", $pass)){
          $panjang_pass1 = false;
          $panjang_pass_msg1 = "Your Password Must Contain At Least 1 Number or capital letter!"; 
    }
    
    if( !empty($email) and !empty($pass) and $panjang_pass and $panjang_pass1){
      header("location: dashboard.php");
    }
    
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="icon" type="icon/png" href="img/lego.ico">

    <title>Sign Up</title>
  </head>
  <body>
  <center>
    <div class="container">
      <div class="container2">
      <h1>HELLO</h1>
      <h6>Create your account</h6>
        <form action="" method="POST">

          <!-- Email -->
          <div class="row justify-content-center">
            <div class="col-11">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" required="required" name="email" placeholder="Enter your email">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill field-icon" viewBox="0 0 16 16">
                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
              </svg>
              </div>
            </div>
          </div>

          <!-- Password -->
          <div class="row justify-content-center">
            <div class="col-11">
              <div class="form-group mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password" id="pass_log_id">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill field-icon" viewBox="0 0 16 16">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                </svg>
                <p style="font-size: 14px; margin-top: 10px"><?php echo $panjang_pass_msg; ?></p>
                <p style="font-size: 14px; margin-top: 10px"><?php echo $panjang_pass_msg1; ?></p>
              </div>
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-4">
              <h6>Sign up</h6>    
            </div>
            <div class="col-4">
              <button type="submit" name="submit" class=""><p>➝</p></button>
            </div>
          </div>
        </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
      </div>
  </center>
  </body>
</html>