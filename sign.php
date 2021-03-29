<?php
session_start();
require_once("config.php");
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) || empty($password)) {
        echo 'Username or password is empty!';
    }
    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
    }
    if (strlen($password) < 6) {
        echo "Your Password Must Contain At Least 6 Characters!";
    }
    if (!preg_match("#[0-9]+#", $password) && !preg_match("#[A-Z]+#", $password)) {
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sign.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="utama">
    <h1>Sign Up</h1>
    <form action="sign.php" method="post" encypte="multipart/form-data">
                <label>Username</label><br>
                <input type="text" name="username"><br>
                <label>Password</label><br>
                <input type="password" name ="password"><br> <br>
                <button type="submit" name="submit">Register</button>
            </form>
        <br>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>
</body>
</html>