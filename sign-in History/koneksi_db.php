<?php

	$hostNya = "localhost";
	$nameNya = "2021_05_web_login_v2";
	$userNya = "root";
	$passNya = "";

	try{
		$pdo= new PDO("mysql:hostNya={$hostNya};dbname={$nameNya}",$userNya,$passNya);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "Koneksi database gagal";
	}

?>