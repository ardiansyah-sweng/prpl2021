<?php

require_once("config.php");

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_insert = "INSERT INTO data VALUES('$username', '$password')";
    mysqli_connect($config, $sql_insert);
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
    <title>Login Page</title>
</head>
<body>

<header>
    <h1>LOGIN</h1>
    <h5>Masukkan Username dan Password Anda!</h5>
</header>

    <form class="menu" action="" method="post">
        <form action="" method="POST">
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
                <button><a href="dashboard.php">Masuk</a></button>
                <button><a href="signup.php">Sign Up</a></button>
            </center> 
        </form>
    </form>
</body>
</html>