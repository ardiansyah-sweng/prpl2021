<?php 
session_start();

	
	include("functions.php");
	
    	

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$obj = new SignUp_Login();
		$obj -> login($user_name, $password);

		
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
		
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: darkseagreen;
		border: none;
	}

	#box{

		background-color: cornflowerblue;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 35px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login" name="login"><br><br>

			<label>	Dont't have account? </label><a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>