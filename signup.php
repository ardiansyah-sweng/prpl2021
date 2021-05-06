<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


class masuk{
    public $username="";
    public $password="";

    public function register()
    {
//////////////////
    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    $email = $_POST['email'];
    $password = $_POST['password'];

    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'hansu212223@gmail.com';                     //SMTP username
    $mail->Password   = 'Lalaland7071';                               //SMTP password
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('hansu212223@gmail.com', 'Admin');
    $mail->addAddress($email);     //Add a recipient
    $mail->addReplyTo('hansu212223@gmail.com', 'Admin');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Akun Anda telah aktif!';
    $mail->Body    = '<h1>Congratulations!!</h1> <p>Welcome to our newest member!</p>';

    if($mail->send())
    {
        echo 'Message has been sent';
    }
    else{
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
///////////
    }
    
    public function checkout()
    {
        $koneksi = mysqli_connect('localhost', 'root', '', 'db_user') or die($koneksi);
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
    
        if(!empty($this->email)and !empty($this->password)){$sql_insert = "INSERT INTO user VALUES('$this->email','$this->password')";
            mysqli_query($koneksi,$sql_insert);
                header("location:dashboard.php"); 
        }
    }
}
$in = new masuk();
if(isset($_POST['submit'])){
    $in->email = $_POST['email'];
    $in->password = $_POST['password'];
    $in -> register();
    $in -> checkout();
    
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign up</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylereg.css">
    <title>Document</title>
</head>
<body>
<div id="card">
<div id="card-content">
  <div id="card-title">
    <h2>Sign up Here! </h2>
        <div class="underline-title"></div>
        <form class="form" action="signup.php" method="post" enctype="multipart/form-data" >

    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td> <input type="text" name="email" value=""> </td>

        </tr>
        <tr>
            <td>Password </td>
            <td>:</td>
            <td> <input type="password" name="password" value=""> </td>

        </tr>
    </table>
    <button type="submit" name="submit" >Daftar</button>
    <p>Sudah punya akun? <a style="text-decoration : none" href="login.php">Login disini!</a></p>
</form>
         </div>
    </div> 
</div>
</body>
</html>