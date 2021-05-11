<?php

require_once 'config.php';

class SignIn
{
    private $db;

    function __construct() {
        // connecting to database
        // membuat objek dari class DbConnect
        // ditampung dalam atribut $db
        $this->db = new DbConnect();
    }

    function inputValidation($email, $password)
    {
        if (empty($email) || empty($password)) {
            return 'Username or password is empty!';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format!";
        }
        if (strlen($password) < 6) {
            return "Your Password Must Contain At Least 6 Characters!";
        }
        if (!preg_match("#[0-9]+#", $password) && !preg_match("#[A-Z]+#", $password)) {
            return "Your Password Must Contain At Least 1 Number or capital letter! ";
        }

        if(isset($email) && isset($password)){

            
            $result = $this->db->conn-> query("SELECT * FROM member WHERE email = '$email'");

            if(mysqli_num_rows($result) === 1){

              $row = mysqli_fetch_assoc($result);

              if(password_verify($password, $row['password'])){

                 // mencatat waktu ketika user signin
                date_default_timezone_set('Asia/Jakarta');
                $time = date('Y-m-d H:i:s', time());
                $this->db->conn-> query("INSERT INTO log_history VALUES('', '$email', '$time')");
                
                // memulai session ketika proses sign in berhasil
                session_start();
                $_SESSION['username'] = strstr($email, '@', true);
                header("location: dashboard.php");
                exit;

              } else {
                  return "You entered wrong password!";
              }

            } else {
                return "Your email is not registered!";
            }
        }
    }

    function session(){
      session_start();
      if(isset($_SESSION['username'])){
        header("Location: dashboard.php");
        exit;
      }
    }
}

$sinObj = new SignIn(); //signup objek
$sinObj->session();

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


    <title>Login - buelat.</title>
</head>
<body>
    <header>
      <div class="head-container">
        <div class="head-logo">
           <a href="#" class="head-brand">
             <img src="images/logo.png" alt="">
           </a>
        </div>
      </div>
    </header>

    <section>
      <!-- WARP -->
      <div class="login-container">

        <!-- LEFT CONTENT -->
        <div class="left-content">
            <img src="images/character 20.svg" alt="">
        </div>

        <!-- CENTER CONTENT -->
        <div class="center-content">
          <div class="login-form">

            <div class="login-form-head">
              <h4>Welcome Back :)</h4>
            </div>

             <?php if(isset($_POST['login'])) : ?>
                <p class="error"> <?= $sinObj -> inputValidation($_POST['email'], $_POST['password']) ?>  </p>
             <?php endif; ?> 
            
            <form action="" method="post">
              <div class="input-form">
                <input class="form" type="email" name="email" placeholder="Email">
              </div> 

              <div class="input-form">
                <input class="form" type="password" name="password" placeholder="Password">
              </div>

              <div class="input-form">
                <button class="form btn-signup" type="submit" name="login">Sign In</button>
              </div>
            </form>
            <div class="login-form-foot">
              <p>Don't have an account? <a href="signup.php">Sign up</a></p>
            </div>
          </div>
        </div>
        
        <!-- RIGHT CONTENT -->
        <div class="right-content">
            <img src="images/character 15.svg" alt="">
        </div>
      </div>
    </section>

</body>
</html>