<?php
$url = file_get_contents('https://api.kawalcorona.com/indonesia'); //API publik data covid-19 dari website kawalcorona.com
$data = json_decode($url, true);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Covid Indonesia</title>
    <style>
    body{
        background-color: #e6e6e6;
        font-family: arial;
    }
    .row1{
        color: white;
    }
    tr td{
        padding: 10px;
        text-align: center;
    }
    </style>
</head>
<body>
    <center>
<h1>Data Covid-19 di Indonesia</h1>
    <table border="1" colspan="10">
        <tr class="row1">
            <td bgcolor="#ff1a1a",>Positif</td>
            <td bgcolor="#00cc00"> Sembuh</td>
            <td bgcolor="#262626">Meninggal</td>
        </tr>
        <tr>
            <td><?php echo $data[0]['positif']?></td>
            <td><?php echo $data[0]['sembuh']?></td>
            <td><?php echo $data[0]['meninggal']?></td>
        </tr>
    </table>
    </center>
</body>
</html>