<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: signUP.php");
}
echo 'Welcome, '. $_SESSION['username'];



?>
