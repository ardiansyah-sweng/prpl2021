<?php
session_start();
	include_once 'user.php';
	$user = new User();
	
	if (isset($_REQUEST['submit'])) {
		extract($_REQUEST);
	    $login = $user->check_login($emailusername, $password);
	    if ($login) {
	        // sign up Success
	       header("location:dashboard.php");
	    } else {
	        // sign up Failed
	        echo 'Wrong username or password';
	    }
	}
?> 

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style><!--
    #container{width:400px; margin: 0 auto;}
--></style>
 
<script type="text/javascript" language="javascript">
            function submitlogin() {
                var form = document.login;
				if(form.emailusername.value == ""){
					alert( "Enter email or username." );
					return false;
				}
				else if(form.password.value == ""){
					alert( "Enter password." );
					return false;
				}
			}
</script>
 
<span font-size: 13px; font-style: normal; line-height: 1.5;">
<div id="container"></span>
<center><h1>Login Here</h1>
<form action="" method="post" name="login">
<table>
<tbody>
<tr>
<th>Username or Email:</th>
<td><input type="text" name="emailusername" required="" /></td>
</tr>
<tr>
<th>Password:</th>
<td><input type="password" name="password" required="" /></td>
</tr>
<tr>
<td></td>
<td><input onclick="return(submitlogin());" type="submit" name="submit" value="Sign In" /></td>
</tr></center>
<tr>
<td></td>
<td>Don't Have an Account?<a href="signup.php">Sign Up here</a></td>
</tr>
</tbody>
</table>
</form></div>
</body>
</html>

