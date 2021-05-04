<?php
include 'koneksi.php';          //melakukan koneksi kedatabase
$batasan = 7;

//Proses untuk membuat url halaman
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batasan) - $batasan : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

//Penghitungan jumlah halaman
$data = mysqli_query($connect_history, "SELECT * FROM log_history");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batasan);                           //digunakan untuk membulatkan jumlah page

$tanggal_awal = strtotime(date('Y-m-d H:i:s'));
$awal = date('Y-m-d H:i:s', strtotime('-7 day', $tanggal_awal));    //Hari sekarang dikurang 7 hari
$akhir = date('Y-m-d H:i:s');                                           //Waktu yang digunakan sekarang

//Query menampilkan data hari ini sampai 7 hari kebelakang
$data_log_history = mysqli_query($connect_history, "SELECT * FROM log_history WHERE log BETWEEN '$awal' AND '$akhir' limit $halaman_awal, $batas");
$nomor = $halaman_awal + 1;

?>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Log History</title>

    <style>
        body {
            background-image: url(ground.png);
            background-size: cover;
            font-family: sans-serif;
        }
    </style>
</head>

<body>
    <h1>Hello, world!</h1>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>