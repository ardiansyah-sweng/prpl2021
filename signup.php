<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


class masuk{
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
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'akunbodonguad@gmail.com';                     //SMTP username
    $mail->Password   = 'riscoganteng1';                               //SMTP password
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('akunbodonguad@gmail.com', 'Admin');
    $mail->addAddress($email);     //Add a recipient
    $mail->addReplyTo('akunbodonguad@gmail.com', 'Admin');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Your Account Succesfully Created!';
    $mail->Body    = '<h1>Congratulation!!</h1> <p>Thanks for join to our team.</p>';

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
        $koneksi = mysqli_connect('localhost', 'root', '', 'prpl1') or die($koneksi);
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
    
        if(!empty($this->username)and !empty($this->password)){$sql_insert = "INSERT INTO data VALUES('$this->username','$this->password')";
            mysqli_query($koneksi,$sql_insert);
                header("location:dashboard.php"); 
        }
    }
}
$in = new masuk();
if(isset($_POST['submit'])){
    $in->username = $_POST['email'];
    $in->password = $_POST['password'];
    $in -> mailer();
    $in -> sender();
    
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign up</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
<br>
<br>
<br>
    <h1>Sign UP</h1>
    <form action="signup.php" method="post" enctype="multipart/form-data" >

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
</form>


</body>
</html>