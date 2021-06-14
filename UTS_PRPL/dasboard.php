<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("WELCOME");
}
echo 'Welcome, '. $_SESSION['username'];
?>
