<?php
/**
 * SignUp
 * 
 */
require_once("config.php");

        //Import PHPMailer classes into the global namespace
        //These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        //Load Composer's autoloader
        require 'vendor/autoload.php';

        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);


    if (isset($_POST['signup'])) {
            $email = $_POST['username'];
            $pass  = $_POST['password'];

            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'noreply.isannnweb86@gmail.com';                     //SMTP username
            $mail->Password   = 'pprl2021';                               //SMTP password
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('noreply.isannnweb86@gmail.com', 'Admin');
            $mail->addAddress($email);     //Add a recipient
            $mail->addReplyTo('noreply.isannnweb86@gmail.com', 'Admin');

            //Attachments
           $mail->addAttachment('isann.jpg', 'new.jpg');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Your account has created';
            $mail->Body    = ('Hi<br>' . $email . '<br>Selamat bergabung dengan isannnweb<br>isannnweb team');
            if ($mail->send()) {
                header("location: dashboard.php");
            } else {
                echo "<script>alert('404!')</script>";
                echo "<meta http-equiv='refresh' content='0; url=signup.php'>";
            }
        
    

    
        if (empty($email) || empty($pass)) {
            return 'Email or password is empty!';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format!";
        }
        if (strlen($pass) < 6) {
            return "Your Password Must Contain At Least 6 Characters!";
        }
        if (!preg_match("#[0-9]+#", $pass) && !preg_match("#[A-Z]+#", $pass)) {
            return "Your Password Must Contain At Least 1 Number or capital letter! ";
        }
        mysqli_query ($koneksi,"INSERT INTO datas ( username, password ) VALUES ('$email', '$pass' )");
        session_start();
        $_SESSION['username'] = $email;
        header("location: dashboard.php");
    
    }
?>