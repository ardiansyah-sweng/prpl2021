<?php

	// Menampilkan form untuk memilih bangun datar
		function formPilihBangunDatar(){
			echo "<form action='' method='POST'>
					<div class='judul'>
						<h2>Pilih Bangun Datar Yang Ingin Anda Cari</h2>
					</div>
					<input type='text' name='kondisi' value='1' hidden>
					<button class='buttonBangunDatar' type='submit' name='luasPersegiPanjang'>Luas Persegi Panjang</button>
					<button class='buttonBangunDatar' type='submit' name='volumeBola'>Volume Bola</button>
					<button class='buttonBangunDatar' type='submit' name='volumeKerucut'>Volume Kerucut</button>
					<button class='buttonBangunDatar' type='submit' name='volumeKubus'>Volume Kubus</button>
					<button class='buttonBangunDatar' type='submit' name='kelilingLingkaran'>Keliling Lingkaran</button>
				</form>";
		}

	// Menampilkan form untuk penghitungan persegi panjang
	function formLuasPersegiPanjang(){
		echo "<form action='' method='POST'>
				<div class='judul'>
					<h2>Mencari <u>Luas Persegi Panjang</u></h2>
				</div>
				<input type='text' name='kondisi' value='2' hidden>
				<label for='panjang'>Masukkan Panjang</label>
				<input type='number' name='panjang' placeholder='Masukkan Panjang ...'>
				<label for='lebar'>Masukkan Lebar</label>
				<input type='number' name='lebar' placeholder='Masukkan Lebar ...'>
				<button class='buttonHitung' type='submit' name='hitungLuasPersegiPanjang'>Hitung</button>
			</form>";
	}


	// Menampilkan form untuk penghitungan volume bola
	function formVolumeBola(){
		echo "<form action='' method='POST'>
				<div class='judul'>
					<h2>Mencari <u>Volume Bola</u></h2>
				</div>
				<input type='text' name='kondisi' value='2' hidden>
				<label for='jariJari'>Masukkan Jari-Jari</label>
				<input type='number' name='jariJari' placeholder='Masukkan Jari-Jari ...'>
				<button class='buttonHitung' type='submit' name='hitungVolumeBola'>Hitung</button>
			</form>";
	}


	// Menampilkan form untuk penghitungan volume kerucut
	function formVolumeKerucut(){
		echo "<form action='' method='POST'>
				<div class='judul'>
					<h2>Mencari <u>Volume Kerucut</u></h2>
				</div>
				<input type='text' name='kondisi' value='2' hidden>
				<label for='jariJari'>Masukkan Jari-Jari</label>
				<input type='number' name='jariJari' placeholder='Masukkan Jari-Jari ...'>
				<label for='tinggi'>Masukkan Tinggi</label>
				<input type='number' name='tinggi' placeholder='Masukkan Tinggi ...'>
				<button class='buttonHitung' type='submit' name='hitungVolumeKerucut'>Hitung</button>
			</form>";
	}


	// Menampilkan form untuk penghitungan volume kubus
	function formVolumeKubus(){
		echo "<form action='' method='POST'>
				<div class='judul'>
					<h2>Mencari <u>Volume Kubus</u></h2>
				</div>
				<input type='text' name='kondisi' value='2' hidden>
				<label for='sisi'>Masukkan Sisi</label>
				<input type='number' name='sisi' placeholder='Masukkan Sisi ...'>
				<button class='buttonHitung' type='submit' name='hitungVolumeKubus'>Hitung</button>
			</form>";
	}


	// Menampilkan form untuk penghitungan keliling lingkaran
	function formKelilingLingkaran(){
		echo "<form action='' method='POST'>
				<div class='judul'>
					<h2>Mencari <u>Keliling Lingkaran</u></h2>
				</div>
				<input type='text' name='kondisi' value='2' hidden>
				<label for='jariJari'>Masukkan Jari-Jari</label>
				<input type='number' name='jariJari' placeholder='Masukkan Jari-Jari ...'>
				<button class='buttonHitung' type='submit' name='hitungKelilingLingkaran'>Hitung</button>
			</form>";
	}