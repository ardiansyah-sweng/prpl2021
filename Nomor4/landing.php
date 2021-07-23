<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
    <title>Landing</title>
</head>

<?php

require_once("koneksi.php");

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}


?>

<body>
    <div class="container">
        <div class="form row">
            <div class="col-2"></div>
            <div class="col">
                <div class="land">
                    <div class="card-colums">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="text-justify">
                                    <p><?php echo 'Welcome, ' . $_SESSION['username']; ?></p>
                                    <p class="card-text">Selamat karena anda telah berhasil menyelesaikan pendaftaran akun silahkan cek email anda untuk memveritivikasi atau klik link ini
                                        <a href="index.php">Masukk</a> untuk Login menggunakan akun yang telah anda daftarkan
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h1 class="text-center mt-5">Ek Controller</h1>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>