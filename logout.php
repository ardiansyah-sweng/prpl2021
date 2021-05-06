<?php 
session_start();
session_unset();
session_destroy();

// Menuju ke halaman signin.php
header("Location: No4_signin.php");
?>