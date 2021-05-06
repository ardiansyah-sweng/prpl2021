<?php

	$host = "localhost"; // SERVER
	$name = "2021_05_project1"; // NAMA DATA BASE
	$user = "root"; // USER DATA BASE SERVER
	$pass = ""; // PASWORD SERVER

	// KONEKSI PDO MYSQL
	try
	{
		$pdo= new PDO("mysql:host={$host};dbname={$name}",$user,$pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo "Terjadi kesalahan";
	}
