<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styletugas.css">
    <title>HALAMAN LOGIN</title>
</head>
<body>
    <br>
    <br>
    
    <form action="index.php" method="post" encypte="multipart/form-data">
    <div class= "login">
    <h1>HALAMAN LOGIN</h1>
 
        <td>Username:</td>
        <br>
            <input type="text" name="username" placeholder="Username" id="username"/><br>
        </br>

        <td>Password:</td>
        <br>
            <input type="password" name="password" placeholder="Password" id="Password"/><br>
        </br>
        <button type="submit" name="submit">SIGN IN</button>
        <a href="signuptugas.php"><button type="button" name="login">SIGN UP</button></a>
    </div>
    </form>
</body>
</html>

<?php
    session_start();
    require_once("confiq.php");
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            echo 'Username Atau Password Kosong!';
        }
        else if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            echo "Format Email Salah!";
        }
        else if (strlen($password) < 7) {
            echo "Password Anda Harus Terdiri Dari 7 Karakter!";
        }
        else{
            $sql_insert = "INSERT INTO admin VALUES('$username', '$password')";
            mysqli_query($config, $sql_insert);
            $_SESSION['username'] = $username;
            header("Location:dasbordtugas.php");
        }
    }
?>