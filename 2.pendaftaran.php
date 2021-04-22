<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" media="screen" href="pendaftaran.css">
    <title>PENDAFTARAN</title>
</head>
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
   <form>
       <div class="header">PENDAFTRAN</div>
       <div class="container">
           <input type="text" placeholder="First Name">
           <input type="text" placeholder="Last Name">
           <input type="text" placeholder="Email">
           <input type="text" placeholder="Password">
           <input type="text" placeholder="Konfirmasi Password">
           <input type="text" placeholder="NO HP">
           <input type="text" placeholder="ID">
       </div>
       <input type="checkbox" class="cb_agree">SAYA BUKAN ROBOT
       <br>
       <input type="button" onclick="location='1.login.php'" class="bt_signup"name="simpan" value="SIMPAN">
       <br>
       </div>
   </form>
</body>
</html>