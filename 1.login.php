<!DOCTYPE html>
<html>
<head>
 <title>Login</title>
 <link rel="shortcut icon"  href="favicon.ico">
 <link rel="stylesheet" type="text/css" href="login.css">
<body>
  <div align="middle">
    <?php
$filecounter="counter.txt";
$fl=fopen($filecounter,"r+");

$hit=fread($fl,filesize($filecounter));

echo("<table widht=250 align=center border=1 cellspacing=0 cllpadding=0 bordercolor=#000FF><tr>");
echo("<td widht=250 valign=middle align=center");
echo("<font face=verdana size=2 color=#FF0000><b>");
echo ("anda pengunjung ke : ");
echo ($hit);
echo ("</b></font>");
echo ("</td>");
echo("</tr></table>");

fclose($fl);

$fl=fopen($filecounter,"w+");
$hit=$hit+1;

fwrite($fl,$hit,strlen($hit));

fclose($fl);
?>

    </div>
 <div class="login">
  <div class="utama">
   Login
  </div>
  <div class="login-btn">
    <center>USERNAME :</center>
   <form method="post" action="">
    <div>
     <input type="text" name="user" placeholder="Masukan Username" class="user">
    </div>
    <div >
      <center>PASSWORD :</center>
     <input type="password" name="pass" placeholder="Masukan Password" class="pass" >
    </div>
    <center><input type="checkbox" name="checkbox" align="center" class="text" id="checkbox"> Simpan Kata Sandi</center>
    <div class="btnkirim">
     <input type="button" onclick=" location = '3.home.php'" name="login" value="Log In" >
     <input type="button"onclick=" location = '2.pendaftaran.php'" name="btnregis" value="Daftar" class="regis">
    </div>
   </form>
  </div>
 </div>
</body>
</html>