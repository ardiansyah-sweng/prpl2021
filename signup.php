<!DOCTYPE html>
<html>
<head>
	<title>Registrasi Data</title>
	<link rel="stylesheet" type="text/css" href="tambah.css">
</head>
<body>
	<div class="tabel">
	<h1>Registrasi Data</h1>
	<form action="register.php" method="POST">
		<table>
			<tr>
				<td>Nama</td>
				<td> : </td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
			  <td>Email</td>
				<td> : </td>
				<td><input type="email" name="email"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td> : </td>
				<td><input type="password" name="pass"></td>
			</tr>
		</table>
		<br><br>
		<button name="submit" type="submit">Daftar</button><br><br>
		<a href="index.php">Cancel</a>
	</form>
	</div>
</body>
</html>
<?php  
	require_once("koneksi.php");

	if (isset($_POST['submit'])) {
	  $nama = $_POST['nama'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
  if (empty($email) || empty($pass)) {
    return 'Username or password is empty!';
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return "Invalid email format!";
  }
  if (strlen($pass) < 6) {
    return "Your Password Must Contain At Least 6 Characters!";
  }
  if (!preg_match("#[0-9]+#", $pass) && !preg_match("#[A-Z]+#", $pass)) {
    return "Your Password Must Contain At Least 1 Number or capital letter! ";
  }
  
	$sql_insert = "INSERT INTO tb_user VALUES ('$nama', '$email', '$pass')";
	mysqli_query($koneksi, $sql_insert);

	header("Location: index.php");
	}
?>