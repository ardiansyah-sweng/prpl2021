<?php

/**
 * 
 */

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class SignUp
{
  public $email = "";
  public $pass = "";
  public $panjang_pass = true;
  // $panjang_pass_msg = "",
  public $panjang_pass1 = true;
  // $panjang_pass_msg1 = ""; 

  public function Mailer()
  {
    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kyubean7@gmail.com';                   //SMTP username
    $mail->Password   = '1900018205PercobaanSMTP';              //SMTP password
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('sendyapriatna001@gmail.com', 'Admin');
    $mail->addAddress($this->email);                            //Add a recipient
    $mail->addReplyTo('sendyapriatna001@gmail.com', 'Admin');

    //Attachments
    $mail->addAttachment('img/tenor.png');                      //Add attachments

    //Content
    $mail->isHTML(true);                                        //Set email format to HTML
    $mail->Subject = 'Your account has created';
    $mail->Body    = ('Hi<br>' . $this->email . '<br><br>Your account succesfully created<br><b>Please enjoy</b>');

    if ($mail->send()) {
      header("location: dashboard.php");
    } else {
      echo "<script>alert('Error!')</script>";
      echo "<meta http-equiv='refresh' content='0; url=signup.php'>";
    }
  }

  public function passwordValidation()
  {
    //Koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "prpl1");

    if (empty($this->email) || empty($this->pass)) {
      return ' ';
    }

    //Kondisi jika password kurang dari 6 karakter
    if (strlen($this->pass) < 6) {
      $panjang_pass = false;
      return "Your password Must Contain At Least 6 Characters!";
    }

    //Kondisi jika password tidak terdapat 1 huruf kapital atau 1 angka
    if (!preg_match("#[0-9]+#", $this->pass) && !preg_match("#[A-Z]+#", $this->pass)) {
      $panjang_pass1 = false;
      return "Your Password Must Contain At Least 1 Number or capital letter!";
    }

    session_start();
    $_SESSION['username'] = $this->email;

    //Program untuk memasukan data ke database jika semua kondisi terpenuhi
    if (!empty($this->email) and !empty($this->pass) and $this->panjang_pass and $this->panjang_pass1) {

      $this->pass = md5($this->pass);                     //Enkripsi password

      //Query input data ke database
      $sql_insert = "INSERT INTO user VALUES('$this->email', '$this->pass')";
      mysqli_query($koneksi, $sql_insert);

      $this->Mailer();                                    //Memanggil fungsi mailer
    }
  }
}

$signUp = new SignUp();                                   //Deklarasi objek

if (isset($_POST['submit'])) {
  $signUp->email = $_POST['email'];                       //Menyimpan data input email ke dalam class SignUP
  $signUp->pass = $_POST['password'];                     //Menyimpan data input email ke dalam class SignUP
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
        <a href="signin.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left field-iconx" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
          </svg></a>
        <h1>Join with us!</h1>
        <h6>Create your account</h6>
        <form action="" method="POST">

          <!-- Email -->
          <div class="row justify-content-center">
            <div class="col-11">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" required="required" name="email" placeholder="Enter your email">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill field-icon" viewBox="0 0 16 16">
                  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
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
                  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                </svg>
                <p style="font-size: 14px; margin-top: 10px"><?php echo $signUp->passwordValidation(); ?></p>
                <!-- <p style="font-size: 14px; margin-top: 10px"><?php echo $panjang_pass_msg; ?></p>
                <p style="font-size: 14px; margin-top: 10px"><?php echo $panjang_pass_msg1; ?></p> -->
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-11">
              <button type="submit" name="submit" class="">Sign Up</button>
            </div>
          </div>
        </form>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </div>
  </center>
</body>

</html>