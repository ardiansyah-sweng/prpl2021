<?php
include_once 'user.php';  $user = new User(); // Checking for user logged in or not
 
 if (isset($_REQUEST['submit'])){
 extract($_REQUEST);
 $register = $user->reg_user($username, $password, $email);
 if ($register) {
 // Registration Success
 echo 'Registration successful <a href="signin.php">Click here</a> to sign in';
 } else {
 // Registration Failed
 echo 'Registration failed. Email or Username already exits please try again';
 }
 }
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<style><!--
 #container{width:400px; margin: 0 auto;}
--></style>
 
<script type="text/javascript" language="javascript">
 function submitreg() {
 var form = document.reg;
 if(form.name.value == ""){
 alert( "Enter name." );
 return false;
 }
 else if(form.uname.value == ""){
 alert( "Enter username." );
 return false;
 }
 else if(form.upass.value == ""){
 alert( "Enter password." );
 return false;
 }
 else if(form.uemail.value == ""){
 alert( "Enter email." );
 return false;
 }
 }
</script>
<div id="container">
<center><h1>SIGN UP</h1>
<form action="" method="post" name="reg">
<table>
<tbody>
<tr>
<th>Username:</th>
<td><input type="text" name="username" required="" /></td>
</tr>
<tr>
<th>Email:</th>
<td><input type="text" name="email" required="" /></td>
</tr>
<tr>
<th>Password:</th>
<td><input type="password" name="password" required="" /></td>
</tr>
<tr>
<td></td>
<td><input onclick="return(submitreg());" type="submit" name="submit" value="Sign Up" /></td>
</tr>
<tr>
<td></td>
<td>Already registered?<a href="signin.php"> Click Here!</a></td>
</tr>
</tbody>
</table>
</form></center></div>
</body>
</html>

