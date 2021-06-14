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
    <title>Sign In</title>
  </head>
  <body>

<?php

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
      $sql = mysqli_query($connect, "SELECT * FROM signup WHERE email = '$email' AND password = '$pass'");
      $result = mysqli_num_rows($sql);
      // validasi login benar atau salah
      $_SESSION['email'] = $email;
      header("location: index.php");
      if($result==1){
          // jika login benar maka email akan disimpan ke session kemudian akan di redirect ke halaman profil
      }else{
  
          // jika login salah maka variabel form_error diisi value seperti dibawah
          // nilai variabel ini akan ditampilkan di halaman login jika salah
        echo "<script>alert('Password atau Username salah')</script>";
      }
    }
  }  
?>

    <div class="container bg-white">

      <div class="row border">

        <div class="col-8">
        <form action="signin.php" method="POST">
          <div class="mb-3">

            <h1 class="text-italic">SIGN IN</h1>
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
            <button class="btn btn-primary me-md-2" type="submit" name="submit">SIGN IN</button>
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