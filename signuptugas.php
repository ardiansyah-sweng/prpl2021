<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign up</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styletugas.css">
    <title>SIGN UP</title>
</head>
<body>
<br>
<br>
<br>
<center>
    <h1>Sign UP</h1>
    <form action="signuptugas.php" method="post" enctype="multipart/form-data" >
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td> <input type="text" name="username" placeholder="Masukan Username" value=""> </td>

        </tr>
        <tr>
            <td>Password </td>
            <td>:</td>
            <td> <input type="password" name="password" placeholder="Masukan Password"value=""> </td>

        </tr>
    </table>
    <button type="submit" name="submit" >Sign up</button>
    <a href="index.php"><button type="button" name="login">BACK</button></a>
</form>
</center>

</body>
</html> 

<?php

session_start();

require_once("confiq.php");
if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) || empty($password)) {
        echo 'Perthatikan username dan pasword anda tidak boleh kosong!';
    }
    else if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        echo "Email anda salah!";
    }
    else if (strlen($password) < 7) {
        echo "Password anda harus terdiri dari 7 karakter!";
    }
    else {
    $sql_insert = "INSERT INTO data VALUES('$username','$password')";
        mysqli_query($koneksi,$sql_insert);
        $_SESSION['username'] = $username;
        header("location:dasbordtugas.php"); 
    }

}
?>