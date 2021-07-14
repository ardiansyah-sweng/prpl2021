<?php

	include 'koneksi_db.php';

	if (isset($_POST['proses_sign_in'])) {
		$username 	= $_POST['in_username'];
		$password 	= $_POST['in_password'];

        $querySignIn     = $pdo->query("SELECT * FROM akunnya WHERE username='$username' AND password='$password'");
        $rowsSignIn      = $querySignIn->rowCount();
        $resultSignIn    = $querySignIn->fetch(PDO::FETCH_ASSOC);

        if ($rowsSignIn > 0){
            session_start();
            $_SESSION['id_akunnya']		= $resultSignIn['id_akunnya'];
            $_SESSION['nama_lengkap']	= $resultSignIn['nama_lengkap'];
            $_SESSION['email']			= $resultSignIn['email'];

            echo "<script>alert('Berhasil login!'); window.location = 'dashboard.php'</script>";
        }

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign-In Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="assets_style_css.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form method="POST" action="">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="in_username" placeholder="username">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="in_password" placeholder="password">
					</div>
					<div class="form-group">
						<button type="submit" name="proses_sign_in" class="btn btn-warning float-right">SIGN IN <i class="fas fa-sign-in-alt"></i></button>
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="sign-up.php">Sign Up <i class="fas fa-user-edit"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>