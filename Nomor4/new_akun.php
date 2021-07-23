<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
</head>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use SignUp as GlobalSignUp;

//Load Composer's autoloader
require 'vendor/autoload.php';



class SignUp
{
    public $email = "",
        $password = "",
        $passErr = "",
        $panjang_pass = true,
        $panjang_pass_msg = true;

    function sendEmail()
    {
        $mail = new PHPMailer(true);

        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'edokur258@gmail.com';                     //SMTP username
        $mail->Password   = 'Kurniawan123';                               //SMTP password
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('edokur258@gmail.com', 'Admin');
        $mail->addAddress($this->email);     //Add a recipient
        $mail->addReplyTo('edokur258@gmail.com', 'Admin');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Your account has created';
        $mail->Body    = ('Hi<br>' . $this->email . '<br>Selamat');       //diisi dengan kata" penerima email
        if ($mail->send()) {
            header("location: landing.php");
        } else {
            echo "<script>alert('404!')</script>";
            echo "<meta http-equiv='refresh' content='0; url=signup.php'>";
        }
    }

    function inputValidation()
    {
        require_once("koneksi.php");

        if (empty($this->email) || empty($this->password)) {
            return 'Username or password is empty!';
        }

        if (strlen($this->password) < 6) {
            $this->panjang_pass = false;
            return "Your password Must Contain At Least 6 Characters!";
        }

        if (!preg_match("#[0-9]+#", $this->password) && !preg_match("#[A-Z]+#", $this->password)) {
            $this->panjang_pass_msg = false;
            return "Your Password Must Contain At Least 1 Number or capital letter!";
        }

        session_start();
        $_SESSION['username'] = $this->email;

        if (!empty($this->email) and !empty($this->password) and $this->panjang_pass_msg and $this->panjang_pass) {

            $sql_insert = "INSERT INTO user VALUES('$this->id', '$this->email', '$this->password')";      //memasukkan data kedalam database
            mysqli_query($connect, $sql_insert);

            $this->sendEmail();
        }
    }
}

$signup = new SignUp();

if (isset($_POST['submit'])) {
    $signup->email = $_POST['email'];
    $signup->password = $_POST['password'];
}

?>

<body>
    <div class="container">
        <div class="form row">
            <div class="col-3"></div>
            <div class="col">
                <form action="new_akun.php" method="post">
                    <div class="card">
                        <h2 class="text-center mb-5 mt-2">Sign Up</h2>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="example@gmail.com" required>
                            <small id="emailHelp" class="form-text ">Hanya membolehkan @gmail.com</small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
                            <p class="mt-2"><?php echo $signup->inputValidation(); ?></p>
                        </div>
                        <div class="d-grid gap-2 mb-3 text-right mr-5 mt-1">
                            <button type="submit" class="btn btn-outline-dark mb-3" name="submit">Daftar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>