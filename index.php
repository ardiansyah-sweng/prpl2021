<!DOCTYPE html>
<html>
<head>
	<title>Form Login</title>
	<link rel="stylesheet" type="text/css" href="stylein.css">
</head>
<body>
 <center> 
	<h1><font color="#ffffff"><font face="Century Gothic">Login Disini!</font><br></font><br></h1>

	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
 
	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>
 
		<form action="cek_login.php" method="post">
			<label><font color="#ffffff">Username</font><br></label><br>
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required"></br>
			<br></br>
 
			<label><font color="#ffffff">Password</font><br></label><br>
			<input type="password" name="password" class="form_login" placeholder="Password .." required="required"></br>
 
			<input type="submit" class="tombol_login" value="LOGIN">
 
			<br/>
			<br/>
			<center>
				<a class="link" href="https://www.malasngoding.com">kembali</a>
			</center>
		</form>
		
	</div>
 
 </center>
</body>
</html>