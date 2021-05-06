<?php include 'koneksi.php'; ?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
					
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Have an account?</h3>
						<form action="#" class="login-form">
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" placeholder="Username" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" placeholder="Password" required>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Get Started</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

<?php
    function inputValidation($username, $password)
    {
        if (empty($username) || empty($password)) {
            return 'Username or password is empty!';
        }
        if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format!";
        }
        if (strlen($password) < 6) {
            return "Your Password Must Contain At Least 6 Characters!";
        }
        if (!preg_match("#[0-9]+#", $password) && !preg_match("#[A-Z]+#", $password)) {
            return "Your Password Must Contain At Least 1 Number or capital letter! ";
        }
        
        session_start();
        $_SESSION['username'] = $username;
        header("location: dasboard1.php");
    }
?>


