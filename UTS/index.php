<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php

		include 'conn.php';

		if (isset($_POST['login'])) {
			$user 	= $_POST['user'];
			$pass 	= $_POST['pass'];

	        $queryLogin     = $pdo->query("SELECT * FROM data_akun WHERE user='$user' AND pass='$pass'");
	        $rowsLogin      = $queryLogin->rowCount();
	        $resultLogin    = $queryLogin->fetch(PDO::FETCH_ASSOC);

	        if ($rowsLogin > 0){
	            session_start();
	            $_SESSION['id_data_akun']	= $resultLogin['id_data_akun'];
	            $_SESSION['nama']			= $resultLogin['nama'];

	            header('location: dashboard.php');
	        }

		}elseif (isset($_POST['daftar'])) {
			$nama 	= $_POST['nama'];
			$user 	= $_POST['user'];
			$pass 	= $_POST['pass'];

	        try {

                // fungsi untuk menambah data ke dalam databse
                $stmt = $pdo->prepare("INSERT INTO data_akun
                        (nama,user,pass)
                        VALUES(:nama,:user,:pass)" );
                            
                $stmt->bindParam(":nama", $nama, PDO::PARAM_STR);
                $stmt->bindParam(":user", $user, PDO::PARAM_STR);
                $stmt->bindParam(":pass", $pass, PDO::PARAM_STR);

                $count = $stmt->execute();

                $insertId = $pdo->lastInsertId();

                try {
	                $to_email   = $email;
	                $subject    = "Aktivasi Email";
	                $body       = "Silahkan klik link ini untuk melakukan aktivasi: ";
	                $headers    = "From: aktivasi.email@example.com";
	             
	                if (mail($to_email, $subject, $body, $headers)) {
	                   echo "<script>alert('Berhasil mendaftar. Silahkan login!'); window.location = 'index.php'</script>";
	                } else {
	                    echo("Email sending failed...");
	                }
	            } catch (PDOException $e) {
	                echo "Gagal kirim email";     
	            }
                
            }catch(PDOException $e){
                echo "<script>window.alert('Failed to input, please contact our team!'); window.location(history.back(-1))</script>";
                exit();
            }

		}

	?>

	<div class="row">
	    <div class="col-md-6 mx-auto p-0">
	        <div class="card">
	            <div class="login-box">
	                <div class="login-snip"> <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label> <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Daftar</label>
	                    <div class="login-space">
	                        <form method="POST" action="" class="login">
	                            <div class="group">
	                            	<label for="user" class="label">Username</label>
	                            	<input id="user" name="user" type="text" class="input" placeholder="Masukkan username" autocomplete="off">
	                            </div>
	                            <div class="group">
	                            	<label for="pass" class="label">Password</label>
	                            	<input id="pass" name="pass" type="password" class="input" data-type="password" placeholder="Masukkan password" autocomplete="off">
	                            </div>
	                            <div class="group">
	                            	<button type="submit" name="login" class="button">MASUK</button>
	                            </div>
	                        </form>
	                        <form method="POST" action="" class="sign-up-form">
	                            <div class="group">
	                            	<label for="nama" class="label">Nama Lengkap</label>
	                            	<input id="nama" name="nama" type="text" class="input" placeholder="Masukkan nama lengkap" autocomplete="off">
	                            </div>
	                            <div class="group">
	                            	<label for="user" class="label">Username</label>
	                            	<input id="user" name="user" type="text" class="input" placeholder="Masukkan username" autocomplete="off">
	                            </div>
	                            <div class="group">
	                            	<label for="pass" class="label">Password</label>
	                            	<input id="pass" name="pass" type="password" class="input" data-type="password" placeholder="Masukkan password" autocomplete="off">
	                            </div>
	                            <div class="group">
	                            	<button type="submit" name="daftar" class="button">DAFTAR</button>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

</body>
</html>