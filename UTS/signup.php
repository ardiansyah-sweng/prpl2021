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
    $mail->Username   = 'jangkung364@gmail.com';                   //SMTP username
    $mail->Password   = '087738114395';              //SMTP password
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('jangkung364@gmail.com', 'Admin');
    $mail->addAddress($this->email);                            //Add a recipient
    $mail->addReplyTo('jangkung364@gmail.com', 'Admin');

    //Attachments
    // $mail->addAttachment('img/tenor.png');                      //Add attachments

    //Content
    $mail->isHTML(true);                                        //Set email format to HTML
    $mail->Subject = 'Your account has created';
    $mail->Body    = ('Hi<br>' . $this->email . '<br><br>Your account succesfully created<br><b>Please enjoy</b>');

    if ($mail->send()) {
      header("location: landing.php");
    } 
	else {
      echo "<script>alert('Error!')</script>";
      echo "<meta http-equiv='refresh' content='0; url=signup.php'>";
    }
  }

  public function passwordValidation()
  {
    //Koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "prpl2021");

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

    $alert = $signUp->passwordValidation();
  }
}

$signUp = new SignUp();                                   //Deklarasi objek

if (isset($_POST['submit'])) {
  $signUp->email = $_POST['email'];                       //Menyimpan data input email ke dalam class SignUP
  $signUp->pass = $_POST['password'];                     //Menyimpan data input email ke dalam class SignUP
}
?>

<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <style>
			body {font-family: Arial, Helvetica, sans-serif;}
			
			.container {
				margin : 10%;
			}

			h2{
				text-align : center;
			}

			input[type=text], input[type=password] {
				width: 100%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				box-sizing: border-box;
			}

			button {
				color: white;
				border: none;
				cursor: pointer;
				width: 49.8%;
				height : 50px;
				display : inline-block;
			}

			button:hover {
				opacity: 0.8;
			}

			.submitbtn{
				padding: 10px 18px;
				background-color: rgb(0,0,0);
			}

			.cancelbtn {
				padding: 10px 18px;
				background-color: red;
			}

			img.avatar {
				width: 40%;
				border-radius: 50%;
			}

			span.psw {
				float: right;
				padding-top: 16px;
			}

			/* Change styles for span and cancel button on extra small screens */
			@media screen and (max-width: 300px) {
				span.psw {
					display: block;
					float: none;
				}
				.cancelbtn {
					width: 100%;
				}
			}
        </style>
    </head>
  	<body>
		<div class="container">
			<h2>Registration Form</h2>
			<form action="signup.php" method="post">
				<label for="email"><b>Email</b></label>
				<input type="text" placeholder="Enter Your Email" name="email" required>
				<label for="password"><b>Password</b></label>
				<input type="password" placeholder="Enter Your Password" name="password" required>
				<p style="font-size: 14px; margin-top: 10px"><?php echo $signUp->passwordValidation(); ?></p>
										
				<button name="submit" type="submit" class="submitbtn">Login</button>
				<a href="index.html"><button type="button" class="cancelbtn">Cancel</button></a>
			</form>
			<p>Have an account?<a href="sigin.php">Sign In here</a></p>
		</div>
  </body>
</html>