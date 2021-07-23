<?php
$url = file_get_contents('https://api.kawalcorona.com/indonesia/provinsi');
$data = json_decode($url, true);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="alert alert-dark text-center fw-bold fs-3" role="alert" >Data Covid-19 Provinsi</div>
                <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Provinsi</th>
                            <th scope="col">Positif</th>
                            <th scope="col">Sembuh</th>
                            <th scope="col">Meninggal</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($data as $val ) {?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $val['attributes']['Provinsi']; ?></td>
                            <td><?= $val['attributes']['Kasus_Posi']; ?></td>
                            <td><?= $val['attributes']['Kasus_Semb']; ?></td>
                            <td><?= $val['attributes']['Kasus_Meni']; ?></td>
                            <!-- <td>{{ $datas['attributes']['Provinsi'] }}</td>
                            <td>{{ $datas['attributes']['Kasus_Posi'] }}</td>
                            <td>{{ $datas['attributes']['Kasus_Semb'] }}</td>
                            <td>{{ $datas['attributes']['Kasus_Meni'] }}</td> -->
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <a href="https://covid19.go.id/" class="btn btn-primary stretched-link mt-5">Selengkapnya</a>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>


