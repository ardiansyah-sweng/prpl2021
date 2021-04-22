<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<style type="text/css">
		body{
			background-color: #16c79a;
			text-align:  center;
			
		}
		.content{
			text-align:  center;
		}
	</style>
</head>
<body>
	<!-- <a href="index.php">←BACK</a> -->
	<!-- <div class="content">
		<h1>LOGIN USER</h1>
		<form action="" method="post">
		  <div class="form-group">
		    <label >Username:</label>
		    <input  class="form-control" name="uname"><br>
		  </div>
		  <div>&nbsp;</div>
		  <div class="form-group">
		    <label >Password:</label>
		    <input type="password" class="form-control" name="pwd"><br>
		  </div>
		  <div>&nbsp;</div>
		  <button type="submit" name="login" class="btn btn-default">LOGIN!</button>
		</form>
	</div> -->
	</div>
	  <div class="login">
	    <div class="utama">
	     Login User
	  </div>
	  <div class="login-btn">
	    <center>USERNAME :</center>
	    <form method="post" action="">
	      <div>
	       <input type="text" name="uname" placeholder="Masukan Username" class="user">
	     </div>
	     <div >
	      <center>PASSWORD :</center>
	      <input type="password" name="pwd" placeholder="Masukan Password" class="pass" >
	    </div>
	    <center><input type="checkbox" name="checkbox" align="center" class="text" id="checkbox"> Simpan Kata Sandi</center>
	    <div class="btnkirim">
	     <!-- <input type="button" name="login" value="Log In" > -->
	     <button type="submit" name="login" class="btn btn-default">LOGIN!</button>
	   </div>
	  </form>
	  </div>
	</div>

</body>
</html>

<?php 
	error_reporting(E_ERROR | E_PARSE);
	$c = new mysqli("localhost", "root", "", "alumni");
	if ($c->connect_errno) {
		echo json_encode(array('message' => 'Koneksi Gagal'));
		die();
	}

	if (isset($_POST['login'])) {
		$uname = $_POST['uname']; 
		$pwd = $_POST['pwd']; //password
		$sql = "SELECT * FROM user where idUser='$uname'";
		$result = $c->query($sql);
		$pwdDB="";
		if ($result->num_rows > 0) {
			while ($obj = $result->fetch_assoc()) {
				$pwdDB = $obj['password'];
			}
			if ($pwdDB==$pwd) {
				echo "Login berhasil! Klik <a href='dinamis.php'>disini</a> untuk masuk ke pengaturan admin.";
			}
			else{
				echo "Kombinasi username dan password tidak ditemukan";
			}
		}
		else{
			echo "ERROR. Data tidak ditemukan";
		}
	}

 ?>