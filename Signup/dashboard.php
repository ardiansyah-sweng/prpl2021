<?php
session_start('status');
if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
}
echo 'Welcome, '. $_SESSION['username'];

?>
 
