<?php
session_start();
session_destroy();
session_unset($_SESSION['login']);
session_unset($_SESSION['username']);
session_unset($_SESSION['nama']);
header('location:login.php');
?>