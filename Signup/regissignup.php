 <?php
 $koneksi = mysqli_connect("localhost","root","","prpl2021");

//    require("signup1.php"); -->

    // $email = $_POST['email'];
    // $password = $_POST['password'];

    // $code = md5($email.date("Y-m-d"));

//Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    // $mail=("PHPMailer/Exception.php");
    // $mail=("PHPMailer/OAuth.php");
    // $mail=("PHPMailer/PHPMailer.php");
    // $mail=("PHPMailer/POP3.php");
    // $mail=("PHPMailer/SMTP.php");
    require_once("PHPMailer.php");
    require_once("SMTP.php");

//Create a new PHPMailer instance
    $mail = new PHPMailer();

//Tell PHPMailer to use SMTP
    $mail->isSMTP();
    $mail->isHTML(true);

//Enable SMTP debugging
//SMTP::DEBUG_OFF = off (for production use)
//SMTP::DEBUG_CLIENT = client messages
//SMTP::DEBUG_SERVER = client and server messages
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

//Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
//Use `$mail->Host = gethostbyname('smtp.gmail.com');`
//if your network does not support SMTP over IPv6,
//though this may cause issues with TLS

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;

//Set the encryption mechanism to use - STARTTLS or SMTPS
    $mail->SMTPSecure = 'tls';
    $mail->Subject='PHP Mailer Subject';

//Whether to use SMTP authentication
    $mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = 'shfwnirfndi@gmail.com';

//Password to use for SMTP authentication
    $mail->Password = 'shafwan026';

//Set who the message is to be sent from
    $mail->setFrom('no-reply@smtp.gmail.com', 'Your Website Service');

//Set an alternative reply-to address
// $mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
    $mail->addAddress('shafwanirfand261101@gmail.com');
    $mail->addReplyTo('shafwanirfand261101@gmail.com');

//Set the subject line
    $mail->Subject = 'Verification Account';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
    $body = "Hi, Shafwan Irfandi<br>Your Account is succesfully created <br>Please Enjoy <br>Sweng-Academy Team";
    $mail->Body = $body;

//Replace the plain text body with one created manually
    $mail->AltBody = 'Verification Account';


//send the message, check for errors
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
        //Section 2: IMAP
        //Uncomment these to save your message in the 'Sent Mail' folder.
        #if (save_mail($mail)) {
        #    echo "Message saved!";
        #}
    }
 ?>