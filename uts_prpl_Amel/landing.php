<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
        * {
        margin: 0;
        padding: 0;
    }

    body {
        background-image: url(bg2.jpg);
        background-size: cover;
    }

    .up {
        margin-top: 20%;
    }

    button a {
        text-decoration: none;
        color: grey;
        transition: 0.7s ease;
    }

    button a:hover {
        text-decoration: none;
        color: white;
        font-size: 40px;
        transition: 0.7s ease;
    }

    button {
        transition: 0.7s ease;
    }

    button:hover {
        font-size: 40px;
        transition: 0.7s ease;
    }
    </style>
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
            <div class="up">
                <p><?php echo '<h2>Selamat</h2>' . $_SESSION['username']; ?></p>
                <p> Email kamu sudah berhasil terverifikasi di platform kami</p>
                <p>Klik tombol disamping ini dan silahkan Login kembali menggunakan akun yang sudah anda daftarkan</p>
                <button type="button" class="btn btn-outline-dark mt-5 btn-lg"><a href="index.php"> Klik Ini</a></button>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>

    </html>