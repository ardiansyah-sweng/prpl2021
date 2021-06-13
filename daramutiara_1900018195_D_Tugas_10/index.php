<!--
NAMA	: Dara Mutiara
NIM		: 1900018195
-->

<!DOCTYPE html>
<html>
<head>
	<title>JSON - Pendataan Anggota Baru</title>
	<style type="text/css">
		*{
			margin: 0 auto;
		}
		body{
			background-color: #BC7BC8;
			color: #FCF6F5;
			padding: 0 20% 0 20%;
			box-sizing: border-box;
			font-size: 20px;
		}
		header{
			text-align: center;
			font-size: 24px;
			color: #FDC80B;
			border-bottom: 3px double #FDC80B;
			padding-bottom: 10px;
			margin-bottom: 50px;
		}
	</style>
</head>
<body>

	<header>
		<h1>JSON - Pendataan Anggota Baru</h1>
	</header>

	<!-- Script utama hanya pada tag PHP ini --> 
	<?php

		require 'functions.php'; // Di gunakan untuk memanggil beberapa function JSON & Pemrosesan data

		var_dump(getJSON()); // Menampilkan semua data yang ada di dalam JSON

		echo "<br /><br />"; // Memberi jarak dengan break line

		echo "Usia: ".getUsia(getDob(),date('d.n.y')); // Ini adalah memanggil fungsi untuk mengetahui umur dari data yang ada, dimana fungsi penghitungannya ini saya ambil di file functions.php

	?>

</body>
</html>