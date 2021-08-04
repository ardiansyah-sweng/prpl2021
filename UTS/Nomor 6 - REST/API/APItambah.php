if (isset($_POST['nama_produk']) && isset($_POST['tipe_produk']) && isset($_POST['harga']) && isset($_POST['stok'])) {
 $nama_produk    = $_POST['nama_produk'];
 $tipe_produk  = $_POST['tipe_produk'];
 $sql = $conn->prepare("INSERT INTO produk (nama_produk, tipe_produk, harga, stok) VALUES (?, ?, ?, ?)");
 $harga    = $_POST['harga'];
 $stok    = $_POST['stok'];
 $sql->bind_param('ssdd', $nama_produk, $tipe_produk, $harga, $stok);
 $sql->execute();
 if ($sql) {
  echo json_encode(array('RESPONSE' => 'FAILED'));
  //echo json_encode(array('RESPONSE' => 'SUCCESS'));
  header("location:../readapi/tampil.php");
 } else {
}
 }
} else {
 echo "GAGAL";