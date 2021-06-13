<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class signup{
    public $email="";
    public $password="";

    public function process()
    {
    //Instantiation and passing `true` enables exceptions
    $send = new PHPMailer(true);

    //Server settings
    $send->isSMTP();                                            //Send using SMTP
    $send->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $send->SMTPAuth   = true;                                   //Enable SMTP authentication
    $send->Username   = 'akmal.indo456@gmail.com';                     //SMTP username
    $send->Password   = 'akmalganteng123';                               //SMTP password
    $send->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $send->setFrom('akmal.indo456@gmail.com', 'Admin');
    $send->addAddress($this->email);     //Add a recipient
    $send->addReplyTo('akmal.indo456@gmail.com', 'Admin');

    //Content
    $send->isHTML(true);                                  //Set email format to HTML
    $send->Subject = 'Your Account Succesfully Created!';
    $send->Body    = '<h1>Congratulation!!</h1> <p>You are member of Sweng Academy now.</p>';

    if($send->send())
    {
        echo 'Message has been sent';
    }
    else{
        echo "Message could not be sent. Mailer Error: {$send->ErrorInfo}";
        }
    }
    
    public function check()
    {
        $koneksi = mysqli_connect('localhost', 'root', '', 'prpl21');
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
    
        if(!empty($this->email)and !empty($this->password)){
            $sql_insert = "INSERT INTO client VALUES('$this->email','$this->password')";
            mysqli_query($koneksi,$sql_insert);
                header("location:dashboard.php"); 
        }
    }
}
$sign = new signup();
if(isset($_POST['submit'])){
    $sign->email = $_POST['email'];
    $sign->password = $_POST['password'];
    $sign->check();
    $sign->process();
   
    
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sign.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="utama">
    <h1>Sign Up</h1>
    <form action="signup.php" method="POST" encypte="multipart/form-data">
                <label>Email</label><br>
                <input type="email" name="email"><br>

                <label>Password</label><br>
                <input type="password" name ="password"><br><br>

                <button type="submit" name="submit">Register</button>
            </form>
        <br>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>
</body>
</html>