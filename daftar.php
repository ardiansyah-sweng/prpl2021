<?php
session_start();
require_once("config.php");
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['pw'];
    if (empty($username) || empty($password)) {
        echo 'Username or password is empty!';
    }
    else if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
    }
    else if (strlen($password) < 6) {
        echo "Your Password Must Contain At Least 6 Characters!";
    }
    else if (!preg_match("#[0-9]+#", $password) && !preg_match("#[A-Z]+#", $password)) {
        echo "Your Password Must Contain At Least 1 Number or capital letter! ";
    }
    else {
    $sql_insert = "INSERT INTO data VALUES('$username','$password')";
        mysqli_query($koneksi,$sql_insert);
        $_SESSION['username'] = $username;
        header("location:dashboard.php"); 
    }
 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign up</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
<br>
<br>
<br>
    <h1>Sign UP</h1>
    <form action="daftar.php" method="post" enctype="multipart/form-data" >

    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td> <input type="text" name="username" value=""> </td>

        </tr>
        <tr>
            <td>Password </td>
            <td>:</td>
            <td> <input type="password" name="pw" value=""> </td>

        </tr>
    </table>
    <button type="submit" name="submit" >Daftar</button>
</form>


</body>
</html>