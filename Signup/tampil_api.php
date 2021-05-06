<?php
define('HOST','localhost');
define('USER','root');
define('DB','data_mahasiswa');
define('PASS','');
$conn = new mysqli(HOST,USER,PASS,DB) or die('Connetion error to the database');

?>
<?php
require_once('conection.php');

$myArray = array();
if ($result = mysqli_query($conn, "SELECT * FROM data_mahasiswa ORDER BY id ASC")) or die ('error'){
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $myArray[] = $row;
    }
mysqli_close($conn);
    echo json_encode($myArray);
}

?>