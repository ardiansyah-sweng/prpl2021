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

    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'akunbodonguad@gmail.com';                     //SMTP username
    $mail->Password   = 'riscoganteng1';                               //SMTP password
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('akunbodonguad@gmail.com', 'Admin');
    $mail->addAddress($this->username);     //Add a recipient
    $mail->addReplyTo('akunbodonguad@gmail.com', 'Admin');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'AKUN ANDA BERHASIL DIBUAT!';
    $mail->Body    = '<h1>SELAMAT!!</h1> <p>Anda Menjadi Member </p>';

    if($mail->send())
    {
        echo 'Pesan sudah terkirimkan';
    }
    else{
        echo "Pesan tidak bisa terkirimkan. Mailer Error: {$mail->ErrorInfo}";
    }
///////////
    }
    
    public function sender()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'user_login') or die($conn);
        if (empty($this->username) || empty($this->password)) {
            echo "Username Atau Password Kosong!";
        }
        
        if (strlen($this->password) < 6) {
            echo "Password Anda Harus Terdiri Dari 6 Karakter!";
        }
        if (!preg_match("#[0-9]+#", $this->password) && !preg_match("#[A-Z]+#", $this->password)) {
            echo "Password Anda Harus Memiliki 1 Angka Atau Huruf Kapital!";
        }
        session_start();
        $_SESSION['username'] = $this->username;
    
        if(!empty($this->username)and !empty($this->password)){$sql_insert = "INSERT INTO user VALUES('$this->username','$this->password')";
            mysqli_query($conn,$sql_insert);
                header("location:halamandashbord.php"); 
        }
    }
}
$in = new masuk();
if(isset($_POST['submit'])){
    $in->username = $_POST['username'];
    $in->password = $_POST['password'];
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
    <link rel="stylesheet" href="./style.css">
    <title>HALAMAN SIGN UP</title>
</head>
<body>
    <br>
    <br>
    <header>
        <h1>HALAMAN SIGN UP</h1>
    </header>

    <br>
    <h5>BUATLAH USERNAME DAN PASSWORD ANDA</h5>
    <center><form action="halamansignup.php" method="post" encypte="multipart/form-data">
        <td>User Name:</td>
        <br>
            <input type="text" name="username"/><br>
        </br>

        <td>Password:</td>
        <br>
            <input type="password" name="password"/><br>
        </br>

        <button type="submit" name="submit" a href="halamanlogin.php">SIGN UP</button>
    </form></center>
</body>
</html>
