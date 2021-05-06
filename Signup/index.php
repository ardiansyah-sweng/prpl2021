<?php

function http_request($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

$data = http_request("tampil_api.php");
$data = json_decode($data, TRUE); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tampil Barang</title>
        <link rel="stylesheet" href="layout/css/style.css"> </head>

    <body>
        <div class="wrap">
            <div class="header">
                <h1>RESTFul API</h1> </div>
            <div class="menu">
                <ul>
                    <li><a href="">Home</a></li>
                </ul>
            </div>
            <div class="badan">
                <div class="sidebar">
                    <ul>
                        <li><a href="../readapi/tampil.php">Produk</a></li>
                        <li><a href="#">About</a></li>
                    </ul>
                </div>
                <div class="content">
                    <p>Data Mahasiswa</p>
                    <table style="width:100%">
                        <tr>
                            <td>Nama</td>
                            <td>Tipe Produk</td>
                            <td>Aksi</td>
                        </tr>
                        <?php foreach ($data as $data) { ?>
                            <tr>
                                <td>
                                    <?= $data["NIM"] ?>
                                </td>
                                <td>
                                    <?= $data["Nama"] ?>
                                </td>
                                <td>
                                    <?= $data["Asal"] ?>
                                </td>
                                <td colspan="2">  </td>
                            </tr>
                            <?php } ?>
                    </table>
                </div>
            </div>
            <div class="clear"></div>
            <div class="footer">
                <p>RESTFul API</p>
            </div>
        </div>
    </body>
    </html>