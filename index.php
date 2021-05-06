<?php

class masuk{
    public $username="";
    public $password="";

    public function lgin()
    {

        $koneksi = mysqli_connect('localhost', 'root', '', 'prpl1') or die($koneksi);
        $login = mysqli_query($koneksi,"select * from data where username='$this->username' and password='$this->password'");
        
        $cek = mysqli_num_rows($login);
        
        if($cek > 0){
            session_start();
            $_SESSION['username'] = $this->username;
            $_SESSION['status'] = "login";
            header("location:dashboard.php");
        }else{
            header("location:index.php");	
        }
    }
}

$in = new masuk();
if(isset($_POST['submit'])){
    $in->username = $_POST['email'];
    $in->password = $_POST['password'];
    $in -> lgin();
    
    
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
	<div class="container">
<br>
<br>
<br>
    <h1>Sign UP</h1>
    <form action="index.php" method="post" enctype="multipart/form-data" >

    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td> <input type="text" name="email" value=""> </td>

        </tr>
        <tr>
            <td>Password </td>
            <td>:</td>
            <td> <input type="password" name="password" value=""> </td>

        </tr>
    </table>
    <button type="submit" name="submit" >LOGIN</button> 
	<p>Belum punya akun ? <a href="signup.php" style="text-decoration : none; color : pink" >klik disini  </a></p>
	 
</form>

</div>
</body>
</html>