<?php 
 
$koneksi = mysqli_connect("localhost","root","","signup_prpl");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>