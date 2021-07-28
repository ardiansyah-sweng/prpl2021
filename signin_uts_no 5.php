//* UTS PRPL *//
//* SHANY SASNITA ANDRIANI *//
//* 1900018176 *//
//* D *//
//* NOMOR 5 *//


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styletugas.css">//pemanggilan file css
    <title>HALAMAN LOGIN</title>// penamaan halaman tab web
</head>
<body>
    <br>
    <br>
    
    <form action="index.php" method="post" encypte="multipart/form-data">
    <div class= "login"> // class dengan nama login
    <h1>HALAMAN LOGIN</h1>  // judul halaman web
 
        <td>Username:</td> nama tabel inputan
        <br>
            <input type="text" name="username" placeholder="Username" id="username"/><br> // inputan untuk menginput username
        </br>

        <td>Password:</td> // nama tabel inputan
        <br>
            <input type="password" name="password" placeholder="Password" id="Password"/><br> // inputan untuk menginput password
        </br>
        <button type="submit" name="submit">SIGN IN</button> // fitur tombol sign in
        <a href="signuptugas.php"><button type="button" name="login">SIGN UP</button></a> //  fitur tombol jika di klik akan mengarah pada halaman sign up
    </div>
    </form>
</body>
</html>

<?php
    session_start();// untuk menampilkan email user yang telah di inputkan sebelumnya
 
    require_once("confiq.php"); // menghubungkan dengan file config yang telah di set dengan menghubungkan php my admin
    // kode php ini di peruntukna untuk tombil submit yang akan terhung dengan halam dashboard dan kodenya sama dengan kode di atas tadi
    if(isset($_POST['submit'])) { // pengecekan jika mengkil fitur tombol yang sudah di sambungkan dengan submit ini akan mengarah pada pengecekan ini yang dimana terdapat bebedapa pencabangan
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (empty($username) || empty($password)) { // prose yang akan di eksekusi jika tidak memasukan username dan password
            echo 'Perthatikan username dan pasword anda tidak boleh kosong!'; // output jika pasword atau username tidak ada inputan
        }
        else if (!filter_var($username, FILTER_VALIDATE_EMAIL)) { // proses yang akan di eksekusi jika email yang dimasukan salah
            echo "Email anda salah!"; // output jika email salah 
        }
        else if (strlen($password) < 7) { // proses yang akan di eksekusi jika pasword yang di inputkan kuran dari 7
            echo "Password anda harus terdiri dari 7 karakter!"; // ouput jika password kurang dari 7
        }
        else {
        $sql_insert = "INSERT INTO data VALUES('$username','$password')"; // prose yang akan mengeksekusi jika user name dan password yang di impukan benar
            mysqli_query($koneksi,$sql_insert);
            $_SESSION['username'] = $username;
            header("location:dasbordtugas.php"); 
    }
?>