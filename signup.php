<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class Sign{
    public $username="";
    public $password="";

    public function mailer()
    {
    //////////////////
    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Server settings
    $mail->isSMTP();                                                //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                           //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                       //Enable SMTP authentication
    $mail->Username   = 'prpl191d@gmail.com';                       //SMTP username
    $mail->Password   = '1900018191';                               //SMTP password
    $mail->Port       = 587;                                        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('prpl191d@gmail.com', 'noreply@sweng-academy.com');
    $mail->addAddress($email);     //Add a recipient
    $mail->addReplyTo('prpl191d@gmail.com', 'noreply@sweng-academy.com');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Your Account has Created!';
    $mail->Body    = '<p> Hi, <br> Your Account Succesfully Created!<br><br> Please enjoy<br>Sweng Academy Team</p>';

    if($mail->send())
    {
        echo 'Message has been sent';
    }
    else{
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    ///////////
    }
    
    public function sender()
    {
        $koneksi = mysqli_connect('localhost', 'root', '', 'signup') or die($koneksi);
        if (empty($this->username) || empty($this->password)) {
            echo "email or password is empty!";
        }
        
        if (strlen($this->password) < 6) {
            echo "Your Password Must Contain At Least 6 Characters!";
        }
        if (!preg_match("#[0-9]+#", $this->password) && !preg_match("#[A-Z]+#", $this->password)) {
            echo "Your Password Must Contain At Least 1 Number or capital letter! ";
        }
        session_start();
        $_SESSION['username'] = $this->username;
    
        if(!empty($this->username)and !empty($this->password)){$sql_insert = "INSERT INTO admin VALUES('$this->username','$this->password')";
            mysqli_query($koneksi,$sql_insert);
                header("location:dashboard.php"); 
        }
    }
}

$in = new Sign();
if(isset($_POST['submit'])){
    $in -> username = $_POST['email'];
    $in -> password = $_POST['password'];
    $in -> mailer();
    $in -> sender();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <title>Sign Up</title>
</head>
<body>
<header>
        <h1>SIGN UP</h1>
        <h5>Silahkan Mengisi Form Berikut ini!</h5>
    </header>

        <form action="signup.php" method="POST">
                <td>Email :</td>
                <br>
                    <input type="email" name="email"/>
                <br>

                <td>Password :</td>
                <br>
                    <input type="password" name="password"/>
                </br>
            <br>
            <center>
                <button name="submit" type="submit" class="button">Daftar</button>
            </center> 
        </form>
   
</body>
</html>