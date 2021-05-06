<!DOCTYPE html>
<html>
<head>
    <title>SIGN UN - PRPL</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
      <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
                echo '<center>Login gagal! username dan password salah!</center>';
            }
            else if($_GET['pesan'] == "logout"){
                echo '<center>Anda telah berhasil logout</center>';
            }
            else if($_GET['pesan'] == "belum_login"){
                echo '<center>Anda harus login untuk mengakses halaman admin</center>';
            }
        }
    ?>
    <img class="wave" src="img/wave.png">
    <div class="container">
        <div class="img">
            <img src="img/bg.svg">
        </div>
        <div class="login-content">
            <form method="POST" action="login.php">
                <img src="img/avatar.svg">
                <h2 class="title">Welcome</h2>
                <div class="input-div one">
                   <div class="i">
                        <i class="fas fa-user"></i>
                   </div>
                   <div class="div">
                        <h5>Username</h5>
                        <input type="text" name="username" class="input">
                   </div>
                </div>
                <div class="input-div pass">
                   <div class="i"> 
                        <i class="fas fa-lock"></i>
                   </div>
                   <div class="div">
                        <h5>Password</h5>
                        <input type="password" name="password" class="input">
                   </div>
                </div>
                <a href="signup.php">Create account</a>
                <a href="#">Forgot Password?</a>
                <input type="submit" class="btn" value="Sign In">
            </form>
        </div>
    </div>
</body>
</html>
