<?php

session_start();

include("auth/auth.php");

$user = new database();

if (isset($_POST['submit'])) {

	if (empty($_POST['email'])) {
		$emailError = "Email harap di isi";
	} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$emailError = "Format email salah (ex: abc@gmail.com)";
	}

	$uppercase = preg_match('@[A-Z]@', $_POST['password']);
	$number = preg_match('@[0-9]@', $_POST['password']);
	if (empty($_POST['password'])) {
		$passError = "Password harap di isi";
	} elseif (strlen($_POST['password']) < 6) {
		$passError = "Password min 6 karakter";
	} elseif (!$uppercase || !$number) {
		$passError = "Password harus mengandung min 1 huruf kapital dan 1 angka";
	}

	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$user->register($email, $password);
	}
}


?>

<!DOCTYPE html>
<html>

<head>
	<title>FORM SIGNUP</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body class="bg-primary">
	<div class="container">
		<div class="position-absolute top-50 start-50 translate-middle">
			<h2 class="text-center text-white mb-3">Register</h2>
			<div class="card shadow" style="width: 25rem;">
				<div class="card-body">
					<?php if (isset($_SESSION['error'])) : ?>
						<div class="alert alert-danger" role="alert" style="width: 20em;">
							<?= $_SESSION['error']; ?>
							<?php unset($_SESSION['error']) ?>
						</div>
					<?php endif; ?>
					<form class="rounded-4 p-4" method="POST">
						<div class="mb-3">
							<input type="text" name="email" id="email" class="form-control <?= isset($emailError) ? 'is-invalid' : '';  ?>" placeholder="Email" />
							<div class="invalid-feedback">
								<?= $emailError; ?>
							</div>
						</div>
						<div class="mb-3">
							<input type="password" name="password" id="password" class="form-control <?= isset($passError) ? 'is-invalid' : '';  ?>" placeholder="Password" />
							<div class="invalid-feedback">
								<?= $passError; ?>
							</div>
						</div>
						<div class="text-center">
							<button type="submit" name="submit" class="btn btn-primary">SIGN UP</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>