<?php 
error_reporting (0);
session_start();
if($_SESSION['id']==""){
        header("location:login.php");
   
    }
     require 'koneksi.php';
 ?>
 <?php  
$cid=$_SESSION['id'];
$ceksess=mysqli_query($conn, "SELECT * FROM log21 where id='$cid'");
$row=mysqli_fetch_array($ceksess);
 ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
						Hello, <?php echo $row['fname']; ?>
					</span>
<div class="wrap-input100 validate-input m-b-23" data-validate = "name is reauired">
	<span class="label-input100">Full Name</span>
<input class="input100" type="text" name="fname" placeholder="Type your Full Name" readonly value="<?php echo $row['fname']; ?>" readonly>
<span class="focus-input100" data-symbol="&#xf206;"></span> </div>
<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
	<span class="label-input100">Username</span>
<input class="input100" type="text" name="username" placeholder="Type your username" readonly value="<?php echo $row['username']; ?>" readonly>
<span class="focus-input100" data-symbol="&#xf206;"></span> </div>
<div class="wrap-input100 validate-input" data-validate="Password is required">
<span class="label-input100">Password</span>
<input class="input100" type="password" name="password" placeholder="Type your password" value="<?php echo $row['password']; ?>" readonly>
<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					<div class="text-right p-t-8 p-b-31">
						<a href="logout.php">
							Logout?
						</a>
					</div>
					
			

					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Follow my social media
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
						<span class="txt1 p-b-17">
							
						</span>

						<a href="login.php" class="txt2">
							
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
