<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="logen.css">
</head>
<center><body>

	<nav class="navbar">
    <div class="navbar-left"><div class="logo"></div></div>
    <div class="navbar-right">
        <ul>
            <li><a href="Home.php">Home</a></li>
            <li><a href="pemesanan.php">Pemesanan</a></li>
            <li><a>More &nabla;</a>
                <ul class="dropdown-list">
                    <li><a class="dropdown" href="Login.php">Login</a></li>
                    <li><a class="dropdown" href="Register.php">Register</a></li>
                </ul>

            </li>
            <li><a href="About.php">About</li>
            <li><a href='Logout.php'>Logout</a></li>
        </ul>
    </div>
</nav>

<div id="card">
<div id="card-content">
  <div id="card-title">
    <h2>LOGIN</h2>
    
  </div>

  <form method="post" class="form"> 


  <label for="user-email" style="padding-top:13px">&nbsp;Email</label>
  <input
   id="user-email"
   class="form-content"
   type="email"
   name="email"
   autocomplete="on"
   required />
  <div class="form-border"></div>
<label for="user-password" style="padding-top:22px">&nbsp;Password</label>
  <input
   id="user-password"
   class="form-content"
   type="password"
   name="password"
   required />
  <div class="form-border"></div>
 
   <!--
  <div class="form-border"></div>
<a href="#"><legend id="forgot-pass">Forgot password?</legend></a>
-->

<input id="robot" type="checkbox" name="#"> Simpan kata sandi

<div id="submit-btn">
<tr>
   <td colspan="2">
    <center><a href="Home.html">Login</a></center>
   </td>
</tr>
</div>

<div id="submit-btn">
<tr>
   <td colspan="2">
    <center><a href="#">Reset</a></center>
   </td>
</tr>
</div>
<div class="hit">
    <?php
    //buka     file    counter    mode  baca
    $filecounter="Login.txt";
    $fl=fopen($filecounter,"r+");

    //ambil    nilai    hit    dan   simpan    dalam    variabel      $hit
    $hit=fread($fl,filesize($filecounter));

    //tampilkan
    echo "<br><br><br><br>";
    echo("<table       width=250    align=right       border=l    cellspacing=0 cellpadding=0    color=#F4A460><tr>");
    echo(  " <td   width=250     valign=middle     align=center>     ");
    echo(  " <font     face=verdana     size=2   color=white><b>     ");
    echo("Anda pengunjung halaman ke-");
    echo($hit);
    echo("</b></font>");
    echo("</td>");
    echo(  " </tr></table>");
    //tutup     file      counter.txt
    fclose($fl);

    //buka    file    counter.txt       mode   tulis
    $fl=fopen($filecounter,         "w+");

    //tambahkan      nilai    hit    dengan    1
    $hit=$hit+1; 

    //simpan
    fwrite($fl,$hit,strlen($hit));

    //tutup
    fclose($fl);
    ?>
</div> 

<!--
<input id="submit-btn" type="submit" name="submit" value="LOGIN" /><a href="Home.html">LOGIN</a>

<input id="submit-btn" type="reset" name="reset" value="RESET" />
-->

<div id="forgot">
<p>Lupa Password ?</p><a href="#"> Reset Disini!</a>
<p>Belum punya akun ?</p>
<a href="Register.html">Daftar sini!</a>
</div>
  </form>

</div>



















</div>
<!--

	
	<caption>LOGIN</caption>
	<fieldset>
		<form action="#" method="POST">
			<table>
		
			<label>Username</label>
			<input type="text" name="Username">
			<label>Password</label>
			<input type="number" name="Password">
					
			</table>
		</form>

			<tr>
		<td>
		<input type="checkbox"> Simpan kata sandi!!!
		</td>
			</tr>
		<br><br>
		<tr>
  		<td colspan="3" align="center">
  			<input type="submit" name="submit" value="Login" style=" margin: 10px; background-color: #1100FF"  >
  		</td>
  	
  		<td colspan="2" align="center">
  		<input type="reset" name="reset" value="Reset" style=" margin: 2px; background-color: #FF0044 " >
  		</td>
  	</tr>
		<br><br>
		
		<td>
		<p>Lupa Password ?<a href="#">Reset Disini!</a> </p>
		<p>Belum punya akun ?<a href="Register.html">Daftar sini!</a> </p>
	</td>

	</fieldset>
-->
	
</body></center>
</html>