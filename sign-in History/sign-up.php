<?php

	include 'koneksi_db.php';

	// Di bawah ini fungsi untuk memanggil link
    $cek_link   = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $linknya    = explode("sign-up.php", $cek_link);

    if (isset($_POST['proses_sign_up'])) { // Jika sudah melakukan submit pendaftaran, maka program ini akan di jalankan

        // Di bawah ini untuk menampung inputan form yang diisi
        $nama_lengkap 	= $_POST['in_nama_lengkap'];
        $email      	= $_POST['in_email'];
        $username      	= $_POST['in_username'];
        $password   	= $_POST['in_password'];

        // Fungsi untuk mengecek apakah emailnya sudah pernah di daftarkan atau belum
        $queryCekEmail     = $pdo->query("SELECT email FROM akunnya WHERE email='$email'");
        $rowsCekEmail      = $queryCekEmail->rowCount();
        $resultCekEmail    = $queryCekEmail->fetch(PDO::FETCH_ASSOC);

        // Jika emailnya belum pernah di daftarkan, maka boleh melakukan registrasi & program di bawah ini akan di jalankan
        if ($rowsCekEmail == 0){
            try {

                // fungsi untuk menambah data ke dalam databse
                $stmt = $pdo->prepare("INSERT INTO akunnya
                        (nama_lengkap,email,username,password)
                        VALUES(:nama_lengkap,:email,:username,:password)" );
                            
                $stmt->bindParam(":nama_lengkap", $nama_lengkap, PDO::PARAM_STR);
                $stmt->bindParam(":email", $email, PDO::PARAM_STR);
                $stmt->bindParam(":username", $username, PDO::PARAM_STR);
                $stmt->bindParam(":password", $password, PDO::PARAM_STR);

                $count = $stmt->execute();

                $insertId = $pdo->lastInsertId();

                // Program di bawah ini digunakan untuk mengirim link aktivasi ke email yang di gunanakn untuk mendaftar
	            try {
	                $kirim_ke	= $email;
	                $subjectNya	= "Informasi Aktivasi Email";
	                $isiNya		= "Ini adalah pesan untuk aktivasi email";
	                $headerNya	= "From: email.aktivasi@email.com";
	             
	                if (mail($kirim_ke, $subjectNya, $isiNya, $headerNya)) {
	                   echo "<script>alert('Berhasil sign-up, silahkan sign-in!'); window.location = 'sign-in.php'</script>"; // jika berhasil mengirim email, maka akan di arahkan ke halaman ini
	                }else {
	                    echo("Gagal");
	                }
	            } catch (PDOException $e) {
	                echo "Gagal kirim email";     
	            }
                
            }catch(PDOException $e){
                echo "<script>window.alert('Gagal sign-up'); window.location(history.back(-1))</script>";
                die();
            }
        }else{
        	echo "<script>window.alert('Email sudah ada!'); window.location(history.back(-1))</script>";
            die();
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign-Up Page</title>
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
				<h3>Sign Up</h3>
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
							<span class="input-group-text"><i class="fas fa-user-circle"></i></span>
						</div>
						<input type="text" class="form-control" name="in_nama_lengkap" placeholder="Nama Lengkap">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						</div>
						<input type="email" class="form-control" name="in_email" placeholder="email">
					</div>
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
						<button type="submit" name="proses_sign_up" class="btn btn-warning float-right">SIGN UP <i class="fas fa-user-edit"></i></button>
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Have an account?<a href="sign-in.php">Sign In <i class="fas fa-sign-in-alt"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>