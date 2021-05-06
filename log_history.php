<?php
$koneksi = mysqli_connect("localhost", "root", "", "prpl1");
$batas = 7;                    //Batas jumlah data perhalaman

//Proses untuk membuat url halaman
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

//Penghitungan jumlah halaman
$data = mysqli_query($koneksi, "SELECT * FROM log_history");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);                           //Syntax untuk membulatkan jumlah page

date_default_timezone_set('Asia/Jakarta');  							//Lokasi waktu
$tanggal_sekarang = strtotime(date('Y-m-d H:i:s'));
$awal = date('Y-m-d H:i:s', strtotime('-7 day', $tanggal_sekarang));    //Hari sekarang dikurang 7
$akhir = date('Y-m-d H:i:s');                                           //Waktu sekarang

//Query menampilkan data hari ini sampai 7 hari kebelakang
$data_log_history = mysqli_query($koneksi, "SELECT * FROM log_history WHERE log BETWEEN '$awal' AND '$akhir' limit $halaman_awal, $batas");
$nomor = $halaman_awal + 1;
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/cssqu.css">
    <style>
        .container h1 {
            /* margin: 30px 0px 15px 165px; */
            margin: 50px 0px 0px -2px;
            font-size: 35px;
            font-weight: bold;
            color: #014441;
        }

        .container p {
            font-weight: bold;
            margin-left: -1px;
            color: #014441;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="icon" type="icon/png" href="img/lego.ico">


    <title>Log</title>
</head>

<body>
    <!-- Home -->
    <div class="container justify-content-center">
        <h1>LOG HISTORY</h1>
        <p>7 Hari Terakhir</p><br>
        <table class=" table table-bordered table-striped">
            <thead class="table-succes">
                <tr>
                    <th>
                        <p class="head">ID</p>
                    </th>
                    <th style="width: 50%;">
                        <p class="head">Email</p>
                    </th>
                    <th>
                        <p class="head">Sign In Time</p>
                    </th>
                </tr>
            </thead>
            <?php
            $no = 1;
            while ($result = mysqli_fetch_array($data_log_history)) {
            ?>
                <tr>
                    <td>
                        <center>
                            <p><?= $no++ ?></p>
                        </center>
                    </td>
                    <td>
                        <p><?= $result['email'] ?></p>
                    </td>
                    <td>
                        <p><?= $result['log'] ?></p>
                    </td>
                </tr>
            <?php
            }
            ?>
            </thead>
        </table>
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if ($halaman > 1) {
                                                echo "href='?halaman=$previous'";
                                            } ?>>
                        < </a>
                </li>
                <?php
                for ($x = 1; $x <= $total_halaman; $x++) { // Perulangan untuk menampilkan jumlah halaman yang ada
                ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                echo "href='?halaman=$next'";
                                            } ?>> > </a>
                </li>
            </ul>
        </nav>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
        </script>
    </div>
</body>

</html>