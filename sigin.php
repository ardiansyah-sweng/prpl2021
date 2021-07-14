<!DOCTYPE html>
<html>
<head>
	<title>MENU LOGIN</title>
	<link rel="stylesheet" type="text/css" href="praktikum10.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
	<div class="Login">
		<h1>LOGIN</h1>
		<ul><a href="logout.php"></a>
		</ul>
		<form>
		<td>Username</td>
		<td>:</td>
		<input type="Username"class="input-box"placeholder="Username">
		<td>Password</td>
		<td>:</td>
		<input type="Password"class="input-box"placeholder="Password">

		<p><span><a href=""style="color: black"><input type="checkbox" name="">simpan kata sandi</span></a></p>

		<a href=""><input type="button" value="Login"></a></td>
		<a href=""><input type="button" value="Reset"></a></td>
		
		<p>Lupa Password? <a href=""style="color: blue">Reset Disini!</a></p>
		<p>Belum punya akun? <a href="#">Daftar Disini!</a></p>
		<hr>
		<a href="#"><i class="fab fa-facebook"></i></a></td>
		<a href="#"><i class="fab fa-google"></i></a></td>
		<a href="#"><i class="fab fa-twitter"></i></a></td>

		<?php

		$filecounter="counter.txt";
		$fl=fopen($filecounter,"r+");

		$hit=fread($fl,filesize($filecounter));
		echo("<table width=250 align=center border=1 cellspacing=0 cellspacing=0 bordercolor= #0000FF><tr>");
		echo("<td width=250 valign= middle align=center");
		echo("<font face=verdana size=2 color=#FF0000><b>");
		echo("Anda pengunjung yang ke:");
		echo($hit);
		echo("</b></font>");
		echo("</td>");
		echo("</tr></table>");
		fclose($fl);

		$fl=fopen($filecounter,"w+");
		$hit=$hit+1;

		fwrite($fl,$hit,strlen($hit));

		fclose($fl)

		?>
		</form>

	</div>
</body>
</html>







