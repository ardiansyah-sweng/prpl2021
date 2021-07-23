if (isset($_GET['id'])) {
    $sql = $conn->prepare("DELETE FROM produk WHERE id=?");
    $id  = $_GET['id'];
    $sql->execute();
    $sql->bind_param('i', $id);
    if ($sql) {
        echo json_encode(array('RESPONSE' => 'SUCCESS'));
        header("location:../readapi/tampil.php");
    } else {
}
        echo json_encode(array('RESPONSE' => 'FAILED'));
    }
} else {
    echo "GAGAL";