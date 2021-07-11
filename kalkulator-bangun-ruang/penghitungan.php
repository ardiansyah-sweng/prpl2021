<?php

	// Hitung Luas Persegi Panjang
		function hitungLuasPersegiPanjang(){
			$hasilHitung = $_POST['panjang']*$_POST['lebar'];
			return "<h4>Bangun Ruang : Luas Persegi Panjang</h4><h4>Panjang : ".$_POST['panjang']."</h4><h4>Lebar : ".$_POST['lebar']."</h4>"."<h4>Luas Persegi Panjang : ".$hasilHitung." cm2</h4>";
		}

	// Hitung Volume Bola
		function hitungVolumeBola(){
			$hasilHitung = (((4/3)*(22/7))*($_POST['jariJari']*$_POST['jariJari']*$_POST['jariJari']));
			return "<h4>Bangun Ruang : Volume Bola</h4><h4>Jari-Jari : ".$_POST['jariJari']."</h4>"."<h4>Volume Bola : ".$hasilHitung." cm3</h4>";
		}

	// Hitung Volume Kerucut
		function hitungVolumeKerucut(){
			$hasilHitung = (((4/3)*(22/7))*($_POST['jariJari']*$_POST['jariJari'])*$_POST['tinggi']);
			return "<h4>Bangun Ruang : Volume Kerucut</h4><h4>Jari-Jari : ".$_POST['jariJari']."</h4><h4>Tinggi : ".$_POST['tinggi']."</h4>"."<h4>Volume Kerucut : ".$hasilHitung." cm3</h4>";
		}

	// Hitung Volume Kubus
		function hitungVolumeKubus(){
			$hasilHitung = $_POST['sisi']*$_POST['sisi']*$_POST['sisi'];
			return "<h4>Bangun Ruang : Volume Kubus</h4><h4>Sisi : ".$_POST['sisi']."</h4>"."<h4>Volume Kubus : ".$hasilHitung." cm3</h4>";
		}

	// Hitung Keliling Lingkaran
		function hitungKelilingLingkaran(){
			$hasilHitung = ((2*22/7)*$_POST['jariJari']);
			return "<h4>Bangun Ruang : Keliling Lingkaran</h4><h4>Jari-Jari : ".$_POST['jariJari']."</h4>"."<h4>Keliling Lingkaran : ".$hasilHitung." cm</h4>";
		}

	// Kumpulan dari hasil penghitungannya
		function hasilPerhitungan(){
			if (isset($_POST['hitungLuasPersegiPanjang'])) {
				$hasil = hitungLuasPersegiPanjang();
			}

			if (isset($_POST['hitungVolumeBola'])) {
				$hasil = hitungVolumeBola();
			}

			if (isset($_POST['hitungVolumeKerucut'])) {
				$hasil = hitungVolumeKerucut();
			}

			if (isset($_POST['hitungVolumeKubus'])) {
				$hasil = hitungVolumeKubus();
			}

			if (isset($_POST['hitungKelilingLingkaran'])) {
				$hasil = hitungKelilingLingkaran();
			}

			return $hasil;
		}

	// Fungsi di bawah ini digunakan untuk memanggil hasil penghitungannya sesuai dengan bangun datar yang di pilih
		function view(){
			echo "<form>";
			echo "<div class='hasil'>";
			echo hasilPerhitungan();
			echo "</div>";
			echo "</form>";
		}