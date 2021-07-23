<!DOCTYPE html>
<html>
<head>
	<title>Kalkulator Bangun Ruang</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="wrapper">
		<header>
			<h1>Kalkulator Bangun Ruang</h1>
		</header>

		<div class="content">

			<?php

				require 'form.php'; // memanggil file form.php

				// fungsi ini di gunakan untuk tampilan awal website
					if (empty($_POST['kondisi'])) {
						echo formPilihBangunDatar();
					}

				// Fungsi ini akan di panggil sesuai dengan pilihan bangun datar yang akan di hitung
					if (isset($_POST['luasPersegiPanjang'])) {
						echo formLuasPersegiPanjang();
					}elseif (isset($_POST['volumeBola'])) {
						echo formVolumeBola();
					}elseif (isset($_POST['volumeKerucut'])) {
						echo formVolumeKerucut();
					}elseif (isset($_POST['volumeKubus'])) {
						echo formVolumeKubus();
					}elseif (isset($_POST['kelilingLingkaran'])) {
						echo formKelilingLingkaran();
					}

				// Ini adalah proses terakhir, fungsi ini di gunakan untuk menampilkan hasil hitungannya
				if (!empty($_POST['kondisi']) AND $_POST['kondisi']==2){
					require 'penghitungan.php'; // Memanggil file penghitungan.php
					echo view(); // memanggil functions view yang ada di file penghitungan.php
					echo "<a href=''><div class='href'>Hitung Lagi</div></a>"; // Tombol untuk melakukan hitungan ulang
				}

			?>
		</div>

	</div>

</body>
</html>