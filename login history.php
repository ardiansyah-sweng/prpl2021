<?php
require_once("config.php");
$batasan = 7;

$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batasan) - $batasan : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($connect_history, "SELECT * FROM h_login");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batasan);                          

$tanggal_now = strtotime(date('Y-m-d H:i:s'));
$awal = date('Y-m-d H:i:s', strtotime('-7 day', $tanggal_now));         
$akhir = date('Y-m-d H:i:s');                                           

$data_log_history = mysqli_query($connect_history, "SELECT * FROM h_login WHERE sign_time BETWEEN '$awal' AND '$akhir' limit $halaman_awal, $batasan");
$nomor = $halaman_awal + 1;

?>