<?php
function http_request($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}
$data = http_request("http://localhost/dbrest/api/api_edit.php?id=" . $_GET["id"]);
$data = json_decode($data, TRUE);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="layout/css/style.css"> </head>

    <body>
        <div class="wrap">
            <div class="header">
                <h1>STTI API</h1> </div>
            <div class="menu">
                <ul>
                    <li><a href="">Home</a></li>
                </ul>
            </div>
            <div class="badan">
                <div class="sidebar">
                    <ul>
                        <li><a href="../readapi/tampil.php">Produk</a></li>
                        <li><a href="../readapi/about.php">About</a></li>
                    </ul>
                </div>
                <div class="content">
                    <p> <a href="../readapi/tampil.php">Kembali</a> </p>
                    <div id="stylish" class="myform">
                        <h1>EDIT produk</h1>
                        <p>form ini digunakan untuk edit produk</p>
                        <form action="../api/api_ubah.php" method="post" id="form">
                            <div class="form-group">
                                <label for="">Kode produk</label>
                                <input type="text" value="<?= $data[" id "] ?>" name="id" id="id" placeholder="Kode Produk"> </div>
                            <div class="form-group">
                                <label for="">Nama produk</label>
                                <input type="text" value="<?= $data[" nama_produk "] ?>" name="nama_produk" id="nama_produk" placeholder="Nama Produk"> </div>
                            <div class="form-group">
                                <label for="">Tipe produk</label>
                                <input type="text" value="<?= $data[" tipe_produk "] ?>" name="tipe_produk" id="tipe_produk" placeholder="Tipe Produk"> </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="text" value="<?= $data[" harga "] ?>" name="harga" id="harga" placeholder="Harga"> </div>
                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="text" value="<?= $data[" stok "] ?>" name="stok" id="stok" placeholder="Stok"> </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="footer">
                <p> Sekolah Tinggi Teknologi Indonesia</p>
            </div>
        </div>
    </body>

    </html>