<?php

$email= "";
$pasword = "";
$passEror = "";
$coba_pasword1 = true;
$pass_salah1 = "";
$coba_pasword2 = true;
$pass_salah2 = "";

// include 'koneksi.php';

if (ISSET($_POST['submit'])) {
    $email = $_POST['email'];
    $pasword = ($_POST['password']);

    if (empty($email) || empty($pasword)) {
        return 'Username or password Kosong !';
    }
    session_start();
    $_SESSION['username'] = $email;

    if(strlen($pasword)<6){
          $coba_pasword1 = false;
          $pass_salah1 = "minimum panjang 6 karakter!";
    }
    if (!preg_match("#[0-9]+#", $pasword) && !preg_match("#[A-Z]+#", $pasword)){
          $coba_pasword2 = false;
          $pass_salah2 = "minimal mengandung 1 karakter huruf kapital atau angka!"; 
    }
    
    if( !empty($email) and !empty($pasword) and $coba_pasword1 and $coba_pasword2){
      
      header("location: dashboard.php");
    }
    
}
?>

<html>
  <head>
    
    <title>Sign Up</title>
  </head>
  <body>

      <h1>Halaman signup</h1>

        <form action="" method="POST">

                <h2><label>Username</label></h2>
                <input type="email" id="exampleInputEmail1" required="required" name="email" placeholder="Enter your email">
                <h3><label>Password</label></h3>
                <input type="password" name="password" placeholder="Enter your password" >
                <br/>
                <br/>
                <button type="submit" name="submit" class="">
                <p>Sing Up</p></button>
            
        
  </body>
</html>


