<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "log21";

// Create connection
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>