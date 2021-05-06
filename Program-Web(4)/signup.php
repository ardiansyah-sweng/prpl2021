<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class daftar
{
  public $email = "";
  public $password = "";

  public function proses()
  {
    //Instantiation and passing `true` enables exceptions
    $pesan = new PHPMailer(true);

    //Server settings
    $pesan->isSMTP();                                            //Send using SMTP
    $pesan->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $pesan->SMTPAuth   = true;                                   //Enable SMTP authentication
    $pesan->Username   = 'rizqiprosalin@gmail.com';              //SMTP username
    $pesan->Password   = 'Mohak12345';                           //SMTP password
    $pesan->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $pesan->setFrom('rizqiprosalin@gmail.com', 'Admin');
    $pesan->addAddress($this->email);     //Add a recipient
    $pesan->addReplyTo('rizqiprosalin@gmail.com', 'Admin');

    //Content
    $pesan->isHTML(true);                                  //Set email format to HTML
    $pesan->Subject = 'Your Account Succesfully Created!';
    $pesan->Body    = '<h1>Congratulation!! </h1> '. $this->email .'<p> You have been registered.</p>';

    if ($pesan->send()) {
      echo 'Message has been sent';
    } else {
      echo "Message could not be sent. Mailer Error: {$pesan->ErrorInfo}";
    }
  }

  public function cek()
  {
    $koneksi = mysqli_connect('localhost', 'root', '', 'PRPL');
    if (empty($this->email) || empty($this->password)) {
      echo "email or password is empty!";
    }

    if (strlen($this->password) < 6) {
      echo "Your Password Must Contain At Least 6 Characters!";
    }
    if (!preg_match("#[0-9]+#", $this->password) && !preg_match("#[A-Z]+#", $this->password)) {
      echo "Your Password Must Contain At Least 1 Number or capital letter! ";
    }
    session_start();
    $_SESSION['email'] = $this->email;

    if (!empty($this->email) and !empty($this->password)) {
      $sql_insert = "INSERT INTO data_user VALUES('$this->email','$this->password')";
      mysqli_query($koneksi, $sql_insert);
      header("location:dashboard.php");
    }
  }
}
$baru = new daftar();
if (isset($_POST['submit'])) {
  $baru->email = $_POST['email'];
  $baru->password = $_POST['password'];
  $baru->proses();
  $baru->cek();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sign Up Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="utama.css">
</head>

<body>
  <section class="container-fluid bg">
    <section class="row justify-content-center">
      <section class="col-12 col-sm-6 col-md-3">
        <form class="form-container" action="" method="POST">
          <div>
            <label for="">Sign Up</label>
            <hr class="mt-2">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1"><b>User Name</b></label>
            <input name="email" id="email" type="email" class="form-control" placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1"><b>Password</b></label>
            <input name="password" id="password" type="password" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required title="Must contain at least one number and one uppercase and at least 6 or more characters" required>
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <div>
            <label for="">Sudah Memiliki Akun ? <a href="signin.php" style="text-decoration:none">Klik Disini</a></label>
          </div>
          <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block">Sign Up</button>
        </form>
      </section>
    </section>
  </section>
  </script>
</body>

</html>