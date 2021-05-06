<?php
session_start();
include_once 'user.php';
$user = new User(); $id = $_SESSION['id'];
if (!$user->get_session()){
    header("location:signup.php");
}

if (isset($_GET['q'])){
    $user->user_logout();
    header("location:signin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
Home
<style><!--
 body{font-family:Arial, Helvetica, sans-serif;}
 h1{font-family:'Georgia', Times New Roman, Times, serif;}
--></style>
<div id="container">
<div id="header"><a href="signin.php?q=logout">LOGOUT</a></div>
<div id="main-body">
<h1>Hello <?php $user->get_username($id); ?></h1>
</div>
<div id="footer"></div>
</div>
</body>
</html>
