<?php 

    // Mmemanggil koneksi database
    include 'koneksi_db.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign-In History</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<!-- ======= Hero Section ======= -->
<section class="d-flex justify-content-center align-items-center">
    <div class="container position-relative">
        <div class="btn btn-lg btn-block btn-primary">Sign-In History Berdasarkan 7 hari Terakhir</div>
        <table class="table table-striped my-4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Sign In Time</th>
                </tr>
            </thead>
            <tbody>

                <?php

                    $noUrut = 1;
                    $querySignInHistory     = $pdo->query("SELECT * FROM log_history WHERE sign_in_time > NOW() - INTERVAL 7 day ORDER BY sign_in_time DESC");
                    while ($resultSignInHistory    = $querySignInHistory->fetch(PDO::FETCH_ASSOC)) {

                ?>

                <tr>
                    <th scope="row"><?= $noUrut++; ?></th>
                    <td><?= $resultSignInHistory['id']; ?></td>
                    <td><?= $resultSignInHistory['email']; ?></td>
                    <td><?= $resultSignInHistory['sign_in_time']; ?></td>
                </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>
</section>
<!-- End Hero -->
</body>
</html>