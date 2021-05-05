<html>
    <head>
        <title>Home</title>
    </head>
    <style >
        body {margin: 0; 
            font-family: 
            sans-serif;
            background-image: url(image/home.png);
            background-size: cover;}

.header {margin: 20px; color: white; background: #BDB76B; height: 70px;}

.logo {float: left;}

.navbar {float: right;}

.navbar ul{list-style: none; padding-top: 10px;}

.navbar ul li{display: inline; margin: 10px;}

.navbar ul li a{text-decoration: none; color: white; }

.navbar ul li a:hover {border-bottom: 2px solid white;}

.footer {text-align: center; margin: 20px; color: white; background: green; height: 70px;}

.footer p{padding-top:25px;}

.footer a{text-decoration: none; color: white; }

    </style>
<body>

    <div class='header'>
        <div class='logo'>
            <h1>WEBSITEKU</h1>
        </div>

        <div class='navbar'>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a onclick="logout()" >Log Out</a></li>
</ul>

            </ul>
        </div>
    </div>
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

<div class="data">
			<center>
				<h1>Veriera Riski Hidayat</h1>
				<p>DASHBOARD</p>
</center>
		</div>

<script type="text/javascript">
        function logout() {
            var url;
                if (confirm("Silahkan Klik OK jika ingin Log Out dan kembali ke Halaman Log In")) {
                    window.location = "index.php";
                } 
                else {
                    window.location = "home.php"; 
                }
        }
    </script>


</body>
</html>