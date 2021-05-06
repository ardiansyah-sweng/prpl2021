//* UTS PRPL *//
//* SHANY SASNITA ANDRIANI *//
//* 1900018176 *//
//* D *//
//* NOMOR 5 *//

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>SIGN UP</title>// judul untuk halaman tab web
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styletugas.css"> // pemanggilan file css
</head>
<body>
<br>
<br>
<br>
<center>
    <h1>Sign UP</h1> //judul untuk halaman web
    <form action="signuptugas.php" method="post" enctype="multipart/form-data" >
    <table> // membuat tampilan untuk menginputkan username dan password
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
    <button type="submit" name="submit" >Sign up</button> // tombol sign up yang akan terhubung dengan halam dashbord
    <a href="index.php"><button type="button" name="login">BACK</button></a>// tombiol kembali jika ingin langsung login
</form>
</center>

</body>
</html> 

<?php

session_start(); // untuk menampilkan email user yang telah di inputkan sebelumnya


require_once("confiq.php"); // menghubungkan dengan file config yang telah di set dengan menghubungkan php my admin
// kode php ini di peruntukna untuk tombil submit yang akan terhung dengan halam dashboard dan kodenya sama dengan kode di atas tadi
if(isset($_POST['submit'])){ // pengecekan jika mengkil fitur tombol yang sudah di sambungkan dengan submit ini akan mengarah pada pengecekan ini yang dimana terdapat bebedapa pencabangan

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

}
?>