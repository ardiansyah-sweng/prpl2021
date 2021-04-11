<?php
    session_start();
    include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>LOGIN</title>
</head>
<body>
    <div class="utama">
    <h1>login</h1>
       <form action="" method="post">
                <label>Username</label><br>
                <input type="text"><br>
                <label>Password</label><br>
                <input type="password"><br> <br>
                <a href="dashboar.php"><button>Log in</button></a>
            </form>
        <br>
    </div>
</body>
</html>