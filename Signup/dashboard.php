<?php
session_start('PHPMailer');
if (!isset($_SESSION['Username'])) {
    header("Location: regissignup.php");
}
echo 'Welcome, '. $_SESSION['Username'];

?>

