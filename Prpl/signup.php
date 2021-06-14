<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <style>
      body{
        background:whitesmoke;
      }
      .container{
        margin-top: 5%;
      }
      .row{
        
        padding: 5%;
      }
      .col-4{
        background-image: url("assets/bg-signup.jpeg");
        background-size: cover;
      }
    </style>
    </style>
    <title>Sign Up</title>
  </head>
  <body>

  <?php
  //Import PHPMailer classes into the global namespace
  //These must be at the top of your script, not inside a function
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  $alert1 = "";
  $alert2 = "";
  $alert3 = "";
  $alert4 = "";
  $email = "";
  $emailError = "";
  $pass = "";
  $passError = "";
  $emailvalidation = "true";
  $passvalidation = "true";
  $passvalidation2 = "true";


  if(isset($_POST['submit']))
  {
    $connect = mysqli_connect("localhost", "root", "", "signup");

    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    session_start();
    $_SESSION['email'] = $email;

    if (empty($email) || empty($password)) 
    {
      $aler1 =  "Username or Password is Empity";
      // echo "Username or password is empty!";
    }      
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $emailvalidation = "false";
      $alert2 = "Invalid email format!";
    }
    if (strlen($pass) < 6) 
    {
      $passvalidation = "false";
      $alert3 = "Your Password Must Contain At Least 6 Characters!";
    }
    if (!preg_match("#[0-9]+#", $pass) && !preg_match("#[A-Z]+#", $pass)) 
    {
      $passvalidation2 = "false";
      $alert4 = "Your Password Must Contain At Least 1 Number or capital letter! ";
    }
    if( !empty($email) and !empty($pass) and $passvalidation2 == "true" and $passvalidation == "true" and $emailvalidation == "true")
    {
      mysqli_query($connect, "INSERT INTO signup VALUES('$email', '$pass')");
      header("location: dasboard.php");
        //Load Composer's autoloader
        require 'vendor/autoload.php';


        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'teguhbayu52@gmail.com';                     //SMTP username
            $mail->Password   = 'flptpauqeyhrbvxy';                               //SMTP password
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('teguhbayu52@gmail.com', 'Teguh Bayu');
            $mail->addAddress($email, 'User');     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo('teguhbayu52@gmail.com', 'Teguh Bayu');

            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Your Account has Created';
            $mail->Body    = ('Hi, '. $email . ' Your Account is Sucessfully Created. <br><br> Please enjoy <br>UI Bons');

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
  }
    
?>

    <div class="container bg-white">

      <div class="row border">

        <div class="col-8">
        <form action="signup.php" method="POST">
          <div class="mb-3">

            <h1 class="text-italic">SIGN UP</h1>
          </div>
          <div class="mb-3">

            <p>For the best experience please use one of our preferred browser Chrome, Safari, Firefox, or Edge</p>
          </div>

              <div class="mb-3">
    
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <div class="col-sm-10">
    
                  <input type="email" class="form-control" value="<?php echo $email; ?>" id="exampleFormControlInput1" name="email" placeholder="Input Email here" required>
                  <p>
                    <script>  
                    </script>
                  </p>
                </div>
              </div>
              <div class="mb-3">
                
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
    
                  <input type="password" class="form-control" id="exampleFormControlInput1" name="password" placeholder="Input Password here" required>
                </div>
              </div>
              <div class="mb-3">
                <p class="text-danger">
                  <?php echo $alert2; ?>
                </p>
              </div>
              <div class="mb-3">
                <p class="text-danger">
                  <?php echo $alert3; ?>
                </p>
              </div>
              <div class="mb-3">
                <p class=" text-danger">
                  <?php echo $alert4; ?>
                </p>
              </div>
          <div class="mb-3 justify-content-md-start">
            <button class="btn btn-primary me-md-2" type="submit" name="submit">SIGN UP</button>
          </div>
        </form>
        </div>
        <div class="col-4 border">

        </div>
        <div class="col">

        </div>
      </div>
    </div>

    
    
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  </body>
</html>