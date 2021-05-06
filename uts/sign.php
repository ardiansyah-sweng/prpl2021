<?php

require_once 'config.php';
/*
 SignUp
*/
class SignUp
{
    private $db;

    function __construct() {
        // connecting to database
        // membuat objek dari class DbConnect
        // ditampung dalam atribut $db
        $this->db = new DbConnect();
    }


    function sendEmail($email)
    {
        //Your code is here
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        $to = $email;
        $user = strstr($email, '@', true);

        //subject email
        $subject = "Account is successfully created";

        //isi email
        $messege = "
        Hi, " . $user . "
        
        Your account has been created.
        
        ";

        //header email
        $header = "From:tindonesia@gmail.com";

        mail($to, $subject, $messege, $header);

    }

    function inputValidation($email, $password)
  @@ -28,9 +59,109 @@ function inputValidation($email, $password)
        if (!preg_match("#[0-9]+#", $password) && !preg_match("#[A-Z]+#", $password)) {
            return "Your Password Must Contain At Least 1 Number or capital letter! ";
        }
        if(isset($email) && isset($password)){

           $res = $this->db->conn-> query("SELECT * FROM member WHERE email = '$email'");

           if(mysqli_num_rows($res) > 0){
             return "This email already registered!";
           } else {
              // enskirpsi password
              $pass = password_hash($password, PASSWORD_DEFAULT);

              // mengakses atribut publik $conn dari class DbConnect
              // melalui atribut private $db dadri class SignUp
              // kemudian membuat query dari mysqli oop
              $this->db->conn-> query("INSERT INTO member VALUES('','$email', '$pass')");
              $this->sendEmail($email);
           }

        }

        session_start();
        $_SESSION['username'] = strstr($email, '@', true);
        header("location: dashboard.php");
    }
}

$supObj = new SignUp(); //signup objek

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">


    <title>Register - buelat.</title>
</head>
<body>
    <header>
      <div class="head-container">
        <div class="head-logo">
           <a href="#" class="head-brand">
             <img src="image/logo.png" alt="">
           </a>
        </div>
      </div>
    </header>

    <section>
      <!-- WARP -->
      <div class="login-container">

        <!-- LEFT CONTENT -->
        <div class="left-content">
            <img src="image/character 20.svg" alt="">
        </div>

        <!-- CENTER CONTENT -->
        <div class="center-content">
          <div class="login-form">

            <div class="login-form-head">
              <h4>Create account</h4>
            </div>

             <?php if(isset($_POST['registrasi'])) : ?> 
                <p class="error"> <?= $supObj -> inputValidation($_POST['email'], $_POST['password']) ?>  </p>
             <?php endif; ?> 

            <form action="" method="post">
              <div class="input-form">
                <input class="form" type="email" name="email" placeholder="Email">
              </div> 

              <div class="input-form">
                <input class="form" type="password" name="password" placeholder="Password">
              </div>

              <div class="input-form">
                <button class="form btn-signup" type="submit" name="registrasi">Sign Up</button>
              </div>
            </form>
            <div class="login-form-foot">
              <p>Already have an account? <a href="signin.php">Sign in</a></p>
            </div>
          </div>
        </div>

        <!-- RIGHT CONTENT -->
        <div class="right-content">
            <img src="image/character 15.svg" alt="">
        </div>
      </div>
    </section>


</body>
</html>