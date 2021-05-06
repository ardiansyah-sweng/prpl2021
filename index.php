<?php

class Login{
    public $username="";
    public $password="";
    
    public function masuk()
    {
        $koneksi = mysqli_connect('localhost', 'root', '', 'signup') or die($koneksi);
        if (empty($this->username) || empty($this->password)) {
            echo "email or password is empty!";
        }
        session_start();
        $_SESSION['username'] = $this->username;
        
        if(!empty($this->username)and !empty($this->password)){$sql_query = "SELECT * FROM admin VALUES('$this->username','$this->password')";
            mysqli_query($koneksi,$sql_query);
                header("location:menu.html"); 
        }
    }
}

$in = new Login();
if(isset($_POST['login'])){
    $in -> username = $_POST['email'];
    $in -> password = $_POST['password'];
    $in -> masuk();
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

    <?php if(isset($error)) : ?>
        <p st> email/password salah</p>
        <?php endif; ?>


    <form class="menu" action="" method="post">
        <form action="" method="POST">
                <td>Email:</td>
                <br>
                    <input type="text" name="email"/>
                <br>

                <td>Password :</td>
                <br>
                    <input type="password" name="password"/>
                </br>
                <td></td>
            <br>
            <center>
                <button name="login" type="submit" class="button">Login</button>
                <button><a href="signup.php">Sign Up</a></button>
            </center> 
        </form>
    </form>
</body>
</html>