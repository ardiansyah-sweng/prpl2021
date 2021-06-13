<?php

	date_default_timezone_set("Asia/Jakarta"); // Digunakan untuk mensetting ke WIB

	// Di bawah ini adalah fungsi untuk memanggil semua data dari file JSON
	function getJSON(){
		$data 		= file_get_contents('data_anggota.json'); // Mendapatkan data JSON

		return $data; // Mengembalikan data dalam bentuk ARRAY
	}

	// Di bawah ini adalah fungsi untuk mendapatkan DOB dari data yang ada
	function getDob(){
		$arrayData	= json_decode(getJSON(), true); // nge-decode data json ke dalam array
		$getDob		= $arrayData[0]['dob']; // mendapatkan DOB dari data array

		return $getDob; // Menggembalikan data DOB yang di hasilkan
	}

	// Dibawah ini adalah fungsi untuk menghitung umur dari tanggal lahir yang di ketahui
	function getUsia($dob,$condate){ 
	    $ulang_tahun	= new DateTime(date("Y-m-d",  strtotime(implode('-', array_reverse(explode('.', $dob))))));
	    $hari_ini		= new DateTime(date("Y-m-d",  strtotime(implode('-', array_reverse(explode('.', $condate))))));

	    $tahun	= $ulang_tahun->diff($hari_ini)->y; // Fungsi tahun
	    $bulan	= $ulang_tahun->diff($hari_ini)->m; // Fungsi bulan
	    $hari	= $ulang_tahun->diff($hari_ini)->d;	// Fungsi hari

	    $usiaNya		= $tahun." tahun ".$bulan." bulan ".$hari." hari "; // ini adalah program yang akan di tampilkan

	    return $usiaNya; // Mengembalikan usia yang di hasilkan dari penghitungannya
	}

?>