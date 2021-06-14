<?php
$url = file_get_contents('https://www.bni.co.id/Portals/1/xNews/uploads/2020/4/6/DaftarCabangBeroperasi06April2020.pdf'); // data dari website bni.co.id yang menampilkan dta otlet
$list = json_decode($url, true);
?>
<!DOCTYPE html>
<html>
<head>
    <title>list cabang dan otlet beroperasional bni</title>
    <style>
    body{
        background: bg.jpg;
        font-family: arial;
    }
    tr td{
        padding: 10px;
        text-align: center;
    }
    </style>
</head>
<body>
    <center>
<h1>list cabang dan otlet beopersional bni</h1>
    <table border="1" colspan="15">
        <tr class="row1">
            <td bgcolor="orange",>nama cabang</td>
            <td bgcolor="yelow"> alamat</td>
            <td bgcolor="green">kecamatan</td>
            <td bgcolor="red">kelurahan</td>
            <td bgcolor="coral">provinsi</td>
        </tr>
        <tr>
            <td><?php echo $list[0]['nama cabang']?></td>
            <td><?php echo $list[0]['alamat']?></td>
            <td><?php echo $list[0]['kecamatan']?></td>
            <td><?php echo $list[0]['kelurahan']?></td>
            <td><?php echo $list[0]['provinsi']?></td>
        </tr>
    </table>
    </center>
</body>
</html> 