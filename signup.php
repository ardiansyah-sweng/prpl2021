<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$email = "";
$password = "";
$passErr = "";
$panjang_pass = true;
$panjang_pass_msg = "";

session_start();
require_once("koneksi.php");

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  if (empty($email) || empty($password)) {
    return 'Username or password is empty!';
  }

  if(strlen($password) < 6){
    $panjang_pass = false;
    $panjang_pass_msg = "Your password must contain at least 6 characters!";
  }

  if(!empty($email) and !empty($password) and $panjang_pass){
    $sql_insert = "INSERT INTO registrasi VALUES('$id','$email', '$password')";
    mysqli_query($koneksi, $sql_insert);

    session_start();
    $_SESSION['username'] = $email;
    $mail = new PHPMailer(true);

    if (isset($_POST['submit'])) {
      $email = $_POST['email'];
      $pass  = $_POST['password'];

      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'jangkung364@gmail.com';                     //SMTP username
      $mail->Password   = '087738114395';                               //SMTP password
      $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
      $mail->setFrom('jangkung364@gmail.com', 'Admin');
      $mail->addAddress($email);     //Add a recipient
      $mail->addReplyTo('jangkung364@gmail.com', 'Admin');

        //Attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Your account has created';
      $mail->Body    = ('Hi<br>' . $email . '<br>Message');
      if ($mail->send()) {
        header("location: landing.php");
      } 
      else {
        echo "<script>alert('404!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=signup.php'>";
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign Up</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  <main>
    <!-- Alert -->
      <div class="alert alert-warning text-center" role="alert">
        <!-- -->
      </div>
    <!-- Akhir Alert -->

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="assets/images/diego-ph-5LOhydOtTKU-unsplash.jpg" alt="login image" class="login-img">
        </div>
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
            <p><img src="assets/images/logo.png" alt="logo" class="logo">JANGKUNG.CORP</p>
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Registration</h1>
            <form action="" method="post">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="your-email@gmail.com" required="required">
              </div>
              <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="enter your passsword" required="required">
                <p><?php echo $panjang_pass_msg; ?></p>
              </div>
              <button name="submit" id="submit" class="btn btn-block login-btn">Submit</button>
            </form>
            <p class="login-wrapper-footer-text">Already have an account? <a href="login.php" class="text-reset">Sign In</a></p>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>