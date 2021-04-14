<?php

/**
 * SignUp
 * 
 */
class SignUp
{
    /**
     * Send an email to new user
     */
    function sendEmail()
    {
        //Your code is here
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
        
        session_start();
        $_SESSION['username'] = $email;
        header("location: dashboard.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />

    <title>Hello, world!</title>
  </head>
  <style>
    body {
      padding: 0;
      margin: 0;
      background: cornflowerblue;
      height: 100vh;
      overflow: hidden;
    }
    .container {
      width: 430px;
      margin: 20px auto;
      position: relative;
    }
    .container .header {
      font-size: 28px;
      font-weight: bold;
      color: cornsilk;
      padding: 25px 0 30px 25px;
      background: #5c1769;
      border-bottom: 1px solid #370e3f;
      border-radius: 5px 5px 0 0;
    }
    .container form {
      position: absolute;
      background: darkgoldenrod;
      width: 94.4%;
      padding: 50px 10px 0 30px;
      box-sizing: border-box;
      border: 1px solid #6d1c7d;
      border-radius: 0 0 5px 5px;
    }

    form input {
      height: 45px;
      width: 90%;
      padding: 10px;
      border-radius: 3px;
      border: 1px solid silver;
      font-size: 18px;
      outline: none;
    }
    .btn1 {
      background: orange;
      color: white;
      outline: none;
      border: none;
      border-radius: 50px;
      height: 50px;
      width: 130px;
      text-align: center;
    }
    label {
      font-weight: bold;
    }
    a {
      color: yellow;
      cursor: pointer;
      padding: 10px;
    }
    .submit {
      text-align: center;
    }
    .success{
      color: #40754c;
      padding:10px;
      width:95%;
      margin:20px auto;
      background: #D4EDDA;
    }
  </style>
  <body>
    <div class="container py-5">
      <div class="header">Registrasi</div>
      <form action="conn_signup.php" method="POST">
      <?php if(isset($_GET['error'])){ ?><p class="error"> <?php echo $_GET['error'] ?> </p><?php } ?>     

      <?php if(isset($_GET['success'])){ ?><p class="success"> <?php echo $_GET['success'] ?> </p><?php } ?>     



      <div class="form-row py-2">
          <div class="col-lg-12">
      <label>Nama</label>
      <?php if(isset($_GET['name'])){ ?>
        <input type="text" name="name" placeholder="Nama" value="<?php echo $_GET['name']; ?>" /><br>
        <?php } else{ ?>     
          <input type="text" name="name" placeholder="Nama"/><br>
            <?php }?>
          </div>
        </div>

        
        <div class="form-row py-2">
          <div class="col-lg-12">
      <label>Email</label>
      <?php if(isset($_GET['email'])){ ?>
        <input type="text" name="email" placeholder="email" value="<?php echo $_GET['email']; ?>" /><br>
        <?php } else{ ?>     
          <input type="text" name="email" placeholder="email"/><br>
            <?php }?>
          </div>
        </div>

        <div class="form-row py-2">
          <div class="col-lg-12">
      <label>password</label>
      <?php if(isset($_GET['password'])){ ?>
        <input type="password" name="password" placeholder="password" value="<?php echo $_GET['password']; ?>" /><br>
        <?php } else{ ?>     
          <input type="password" name="password" placeholder="password"/><br>
            <?php }?>
          </div>
        </div>

        <div class="form-row py-2">
          <div class="col-lg-12">
      <label>re_password</label>
      <?php if(isset($_GET['re_password'])){ ?>
        <input type="password" name="re_password" placeholder="re_password" value="<?php echo $_GET['re_password']; ?>" /><br>
        <?php } else{ ?>     
          <input type="password" name="re_password" placeholder="Re_password"/><br>
            <?php }?>
          </div>
        <div class="submit">
          <button type="submit" class="btn1 mt-4 mb-5">Singup</button>
        </div>
        <br />
        <div class="singin mt-8 mb-4">
          <small class="teks"
            >Sudah punya akun ?<span><a href="signin.php">Singin sekarang </a></span></small
          >
        </div>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>
