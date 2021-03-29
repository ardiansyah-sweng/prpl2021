<?php

session_start();
require_once("config.php");

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (empty($email) || empty($password)) {
        echo 'Username or password is empty! <br>';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format! <br>";
    }
    if (strlen($password) < 6) {
        echo "Your Password Must Contain At Least 6 Characters! <br>";
    }
    if (!preg_match("#[0-9]+#", $password) && !preg_match("#[A-Z]+#", $password)) {
        echo "Your Password Must Contain At Least 1 Number or capital letter! <br>";
    }
    else{
        $sql_insert = "INSERT INTO admin VALUES('$email', '$password')";
        mysqli_query($config, $sql_insert);
        $_SESSION['email'] = $email;
        header("Location:dashboard.php");
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <title>Sign Up</title>
</head>
<body>
<header>
        <h1>SIGN UP</h1>
        <h5>Silahkan Mengisi Form Berikut ini!</h5>
    </header>

        <form action="signup.php" method="POST">
                <td>Username :</td>
                <br>
                    <input type="text" name="email"/>
                <br>

                <td>Password :</td>
                <br>
                    <input type="password" name="password"/>
                </br>
            <br>
            <center>
                <button name="submit" type="submit" class="button">Daftar</button>
            </center> 
        </form>
   
</body>
</html>