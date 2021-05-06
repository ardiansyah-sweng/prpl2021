<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: signup.php");
}
echo 'Welcome, '. $_SESSION['username'];

?>
      
<html>  
<head lang="en">  
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Sign In</title>  
</head> 
<body> 
<a href="signout.php"><input class="logout" type="submit" value="Sign Out" name="logout"></a>

</body>
</html>