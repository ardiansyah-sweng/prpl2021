<!DOCTYPE html>
<html>
<head>
    <title>User Mikrotik Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
     <?php 
        session_start();
        if($_SESSION['status']!="login"){
            header("location:../index.php?pesan=belum_login");
        }
    ?>
    <img class="wave" src="img/wave.png">
    <div class="container">
        <div class="img">
            <img src="img/bg.svg">
        </div>
        <div class="login-content">
            <form method="POST" action="logout.php">
                <img src="img/avatar.svg">
                <h2 class="title">Welcome <?php echo $_SESSION['username']; ?>! <br> anda telah login</h2>
                <input type="submit" class="btn" value="Logout">
            </form>
        </div>
    </div>
</body>
</html>
