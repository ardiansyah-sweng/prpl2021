<?php

$email= "";
$pass = "";
$passErr = "";
$coba_pass1 = true;
$pass_salah1 = "";
$coba_pass2 = true;
$pass_salah2 = "";

if (ISSET($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = ($_POST['password']);

    if (empty($email) || empty($pass)) {
        return 'Username or password is empty!';
    }

    session_start();
    $_SESSION['username'] = $email;

    if(strlen($pass)<6){
          $coba_pass1 = false;
          $pass_salah1 = "minimum panjang 6 karakter!";
    }
    if (!preg_match("#[0-9]+#", $pass) && !preg_match("#[A-Z]+#", $pass)){
          $coba_pass2 = false;
          $pass_salah2 = "minimal mengandung 1 karakter huruf kapital atau angka!"; 
    }
    
    if( !empty($email) and !empty($pass) and $coba_pass1 and $coba_pass2){
      
       
      
      header("location: dashboard1.php");
    }
    
}
?>

<html>
  <head>
    
    <title>Sign Up</title>
  </head>
  <body>

      <h1>Halaman Login</h1>
      <h2>Segera Login </h2>

        <form action="" method="POST">

          <!-- Email -->
          
                <label>Username</label>
                <input type="email" id="exampleInputEmail1" required="required" name="email" placeholder="Enter your email">
                
          <!-- Password -->
         
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password" id="pass_log_id">
                <p style="font-size: 14px; margin-top: 10px"><?php echo $pass_salah1; ?></p>
                <p style="font-size: 14px; margin-top: 10px"><?php echo $pass_salah2; ?></p>
              
         
              <button type="submit" name="submit" class=""><p>Sing Up</p></button>
              <p>
                Belum punya akun?
                <a href="signup.php">klik untuk daftar</a>
            </p>
        
  </body>
</html>