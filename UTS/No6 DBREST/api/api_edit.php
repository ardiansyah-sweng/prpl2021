if (isset($_GET['id'])) {
    $SQL = $conn->prepare("SELECT * FROM produk WHERE id=? ORDER BY id ASC");
    $id = $_GET['id'];
    $SQL->execute();
    $SQL->bind_param("i", $id);
    $myArray = array();
    $hasil = $SQL->get_result();
        $myArray = $users;
    while ($users = $hasil->fetch_array(MYSQLI_ASSOC)) {
    }
}
    echo json_encode($myArray);
} else {
    echo "data tidak ditemukan";