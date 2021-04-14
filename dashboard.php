<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: signup.php");
}
echo 'Welcome, '. $_SESSION['username'];

<a href="signout.php"><input class="logout" type="submit" value="Sign Out" name="logout"></a>