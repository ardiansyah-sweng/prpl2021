<?php

/**
 * SignUp
 * 
 */
class SignUp
{
    /**
     * Send an email to new user
     */
    function sendEmail()
    {
        //Your code is here
        <!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
<?php
  require 'koneksi.php';
  if(isset($_POST['daftar'])){
    
     	$fname=$_POST['fname'];
     	$username=$_POST['username'];
     	$password=$_POST['password'];
     	$pass = hash('sha256', $password);
 $cek = mysqli_query($conn, "SELECT * FROM log21 where username='$username'");
 $rowcek=mysqli_num_rows($cek);
 if($rowcek > 0){
 	echo '
<script type="text/javascript">
	
	alert("Maaf\nUsername Telah Digunakan!!!");
</script>';

 }else{



      $query = mysqli_query($conn, "INSERT INTO log21 (fname, username, password) VALUES ('$fname', '$username', '$pass')");

            header("Location:login.php");
          }
         }
  ?>	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-49">
						Sign Up
					</span>
<div class="wrap-input100 validate-input m-b-23" data-validate = "name is reauired">
	<span class="label-input100">Full Name</span>
<input class="input100" type="text" name="fname" placeholder="Type your Full Name">
<span class="focus-input100" data-symbol="&#xf206;"></span> </div>
<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
	<span class="label-input100">Username</span>
<input class="input100" type="text" name="username" placeholder="Type your username">
<span class="focus-input100" data-symbol="&#xf206;"></span> </div>
<div class="wrap-input100 validate-input" data-validate="Password is required">
<span class="label-input100">Password</span>
<input class="input100" type="password" name="password" placeholder="Type your password">
<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
					                         <div class="login100-form-bgbtn"></div>
							<button type="submit" name="daftar" class="login100-form-btn">
								Sign Up
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Or Sign Up Using
						</span>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>

					<div class="flex-col-c p-t-155">
		

						<a href="login.php" class="txt2">
							Login Here
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>

    }

    function inputValidation($email, $password)
    {
        if (empty($email) || empty($password)) {
            return 'Username or password is empty!';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format!";
        }
        if (strlen($password) < 6) {
            return "Your Password Must Contain At Least 6 Characters!";
        }
        if (!preg_match("#[0-9]+#", $password) && !preg_match("#[A-Z]+#", $password)) {
            return "Your Password Must Contain At Least 1 Number or capital letter! ";
        }
        
        session_start();
        $_SESSION['username'] = $email;
        header("location: dashboard.php");
    }
}