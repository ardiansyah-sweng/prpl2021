<?php
$host     = 'localhost';
$user     = 'root'; // diisi dengan user database 
                    // defaultnya bernama root karena belum diubah
$password = '';  //diisi dengan password database 
                 // defaultnya kosong
$db       = 'uts_prpl'; //diisi dengan nama database 
 
$link = mysqli_connect($host, $user, $password, $db) or die(mysqli_error());
// untuk melakukan koneksi ke database menggunakan mysqli
?>
