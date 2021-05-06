<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: zzzz.php");
}
echo 'Welcome, '. $_SESSION['email'];  
?>