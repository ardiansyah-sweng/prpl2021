<html>
<head>
    <title>Login here</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <br/>
    <div class="signin">
    <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
                echo "Login gagal! username dan password salah!";
            }
            else if($_GET['pesan'] == "logout"){
                echo "Anda telah berhasil logout";
            }
            else if($_GET['pesan'] == "belum_login"){
                echo "Anda harus login untuk mengakses halaman admin";
            }
        }
    ?>
    <form method="POST" action="login.php">
		<p>Username</p>
		<input type="email" name="email" placeholder="Enter Username" required="">
		<p>Password</p>
		<input type="Password" name="pass" placeholder="Enter Password" required="">
		<br><br><input type="submit" value="Login">
        <br><br>
            Belum mempunyai akun?<a href="signup.php">Daftar</a>  
    </form>
    </div>
</body>
</html>