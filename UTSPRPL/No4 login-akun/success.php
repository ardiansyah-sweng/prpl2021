<?php

    // Memanggil koneksi databas 
    include 'functions/koneksi.php';

    // function ini digunakan untuk mengetahui apakah email berhasil di verifikasi atau belum
    if ($_GET['status']=="Aktif") {

        $status = "Aktif";

        try {
            $sql = "UPDATE akun SET status = :status WHERE id_akun = :id_akun";
                  
            $statement = $pdo->prepare($sql);
            $statement->bindParam(":status", $status, PDO::PARAM_STR);
            $statement->bindParam(":id_akun", $_GET["akun"], PDO::PARAM_INT);
            $count = $statement->execute();
        }catch(PDOException $e){
            echo "<script>window.alert('Halaman Gagal diedit!'); window.location(history.back(-1))</script>";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">

    <title>Success Sign-Up</title>

    <link rel="icon" href="images/icon.png">

    <link rel="stylesheet" href="plugins/css/bootstrap.css">
    <link rel="stylesheet" href="plugins/css/font-awesome.min.css">
</head>

<body class="bg-primary">

    <section class="container bg-primary" style="margin-top: 100px;margin-bottom: 100px;">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-8 col-md-6 col-lg-4 p-4 bg-light rounded-sm shadow text-center">
                <h2 class="text-primary my-2">WELCOME!</h2>
                <h4 class="my-2 text-warning"><?= $_GET['email']; ?></h4>

                <?php

                    if ($_GET['status']=="Pending") {
                        echo "<div class='bg-danger text-light p-2 my-4 text-left'><i class='fa fa-info-circle'></i> Your account is not yet active</div>";
                        echo "<h5 class='my-2 text-primary'>Please click the activation link in your email</h5>";
                    }elseif ($_GET['status']=="Aktif") {
                        echo "<div class='bg-success text-light p-2 my-4 text-left'><i class='fa fa-info-circle'></i> Your account is already active</div>";
                        echo "<div class='form-group mt-4'>";
                        echo "<p class='my-2 text-center'>Already have an account?</p>";
                        echo "<a href='index.php' role='button' class='btn btn-block btn-warning'>Sign In <i class='fa fa-sign-in'></i></a>";
                        echo "</div>";
                    }

                ?> 
                
            </div>
        </div>
    </section>

    <script src="plugins/js/jquery.min.js"></script>
    <script src="plugins/js/popper.js"></script> 
    <script src="plugins/js/bootstrap.min.js"></script>

    <script type="text/javascript">

        // Popover
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
        });
        // Popover

    </script>

</body>
</html>