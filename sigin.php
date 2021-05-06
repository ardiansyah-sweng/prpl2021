<!DOCTYPE html>
<html>
<head>
	<title>Sign-In</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<style>
  	body{
			background-repeat: no-repeat;
			background-size:cover
		}
		#card {
			background: #00ffff;
			border-radius: 8px;
			box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
			height: 410px;
			margin: 6rem auto 8.1rem auto;
			width: 329px;
}
  	
	#card-content {
      	padding: 12px 44px;
}
	#card-title {
      font-family: "Raleway Thin", sans-serif;
      letter-spacing: 4px;
      padding-bottom: 23px;
      padding-top: 13px;
      text-align: center;
	}
	.underline-title {
      background: -webkit-linear-gradient(right, #6E2C00, #935116);
      height: 2px;
      margin: -1.1rem auto 0 auto;
      width: 89px;
	}
	a {
    text-decoration: none;
	}
	label {
    font-family: "Raleway", sans-serif;
    font-size: 11pt;
	}
	#forgot-pass {
    color: #6E2C00;
    font-family: "Raleway", sans-serif;
    font-size: 10pt;
    margin-top: 3px;
    text-align: right;
	}
	.form {
    align-items: left;
    display: flex;
    flex-direction: column;
	}
	.form-border {
    background: -webkit-linear-gradient(right, #6E2C00, #935116);
    height: 1px;
    width: 100%;
	}
	.form-content {
    background: #fbfbfb;
    border: none;
    outline: none;
    padding-top: 14px;
	}
	#signup {
    color: #6E2C00;
    font-family: "Raleway", sans-serif;
    font-size: 10pt;
    margin-top: 16px;
    text-align: center;
	}
	#submit-btn {
    background: -webkit-linear-gradient(right, #6E2C00, #935116);
    border: none;
    border-radius: 21px;
    box-shadow: 0px 1px 8px #6E2C00;
    cursor: pointer;
    color: white;
    font-family: "Raleway SemiBold", sans-serif;
    height: 42.3px;
    margin: 0 auto;
    margin-top: 50px;
    transition: 0.25s;
    width: 153px;
	}
	#submit-btn:hover {
    box-shadow: 0px 1px 18px #6E2C00;
	}





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







