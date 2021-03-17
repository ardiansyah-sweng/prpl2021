<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: signup.php");
}
echo 'Welcome, '. $_SESSION['username'];
