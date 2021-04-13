<?php
session_start('PHPMailer');
if (!isset($_SESSION['Username'])) {
    header("Location: regissignup.php");
}
echo 'Welcome, '. $_SESSION['Username'];

?>

<!-- <html>
<body>
<center>
    <br><br><br><br>
    <h4>Welcome,<br>Shafwan Irfandi....!
</center>
</body>
</html> -->
