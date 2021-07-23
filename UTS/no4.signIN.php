<?php
   $email =  "";
   $password = "";
   $emailErr = "";
   $passwordErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
    
    if (empty($_POST["password"])) {
    $passwordErr = "password is required";
    } else {
    $password = test_input($_POST["password"]);
    }
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9]+$/i",$password)) {
      $passwordErr = "Contains at least 1 capital or numeric letter";
      }

      if (strlen($password) < 6)
      {
         $passwordErr = "minimum is 6";
      }
    }
  

  session_start();
  $_SESSION['username'] = $email;
  header("Location: dashboard.php");

  ?>
<!DOCTYPE html>
<html>

<head>
  <style>
    label{
      display:block;
    }
  </style>
</head>
<body>
  <div>
  <h3>Sign In</h3><br>
<form action=""  method="post">
    <br>
    <label>Username : </label><br> <input type="text" name="nama">
              <br><br>
    <label>Password : </label><br> <input type="password" name="pass">
    <br><br>
  	<input type="submit" name="simpan" value="Sign In">
    <br><br>
	</form>
</div>
</body>

</html>