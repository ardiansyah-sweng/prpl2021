<?php

session_start();

include("auth/auth.php");

$user = new database();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user->login($email, $password);
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>FORM LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <br />
    <br />
    <center>
        <h1>LOGIN</h1>
    </center>
    <br />
    <div class="login">
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger" role="alert" style="width: 20em;">
                <?= $_SESSION['error']; ?>
                <?php unset($_SESSION['error']) ?>
            </div>
        <?php endif; ?>
        <form class="rounded-4 p-4" method="POST">
            <div class="mb-3">
                <label>Email:</label>
                <input type="text" name="email" id="email" class="form-control" />
                <div class="invalid-feedback">
                    <?= $emailError; ?>
                </div>
            </div>
            <div class="mb-3">
                <label>Password:</label>
                <input type="password" name="password" id="password" class="form-control" />
            </div>
            <div class="text-center mb-3">
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
            </div>
            <p>
                Belum punya akun?
                <a href="register.php">klik untuk daftar</a>
            </p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>