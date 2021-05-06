<?php

require_once "dbconfig.php";


if ($user->isLoggedIn()) {

    header("location: index.php");
}

if (isset($_POST['kirim'])) {

    $nama = $_POST['nama'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    if (strlen($password) < 8 || strlen($password) > 12) {

        $error = true;

        // return header("location: register.php");
    } else {
        if ($user->register($nama, $email, $password)) {
            $user->sender($email);
            $success = true;
        } else {

            $error = true;
        }
    }

    // if ($user->sender($email)) {
    //     echo "berhasil";
    // }


}

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <title>Register</title>

    <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">

</head>

<body>

    <div class="login-page">

        <div class="form">

            <form class="register-form" method="post">

                <?php if (isset($error)) : ?>

                    <div class="error">

                        Email Sudah digunakan atau password salah

                    </div>

                <?php endif; ?>

                <?php if (isset($success)) : ?>

                    <div class="success">

                        Berhasil mendaftar. Silakan <a href="login.php">login</a>.

                    </div>

                <?php endif; ?>

                <input type="text" name="nama" placeholder="nama" required />

                <input type="email" name="email" placeholder="email address" required />

                <input type="password" name="password" placeholder="password" required />

                <button type="submit" name="kirim">create</button>

                <p class="message">Already registered? <a href="login.php">Sign In</a></p>

            </form>

        </div>

    </div>

</body>

</html>