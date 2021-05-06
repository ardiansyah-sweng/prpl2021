<?php


class SignUp
{

    /**
     * Send an email to new user
     */
    function sendEmail($email, $mail)
    {
        $emailtuju = ($email['email']);
        include "classes/class.phpmailer.php";
        $mail = new PHPMailer; 
        $mail->IsSMTP();
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = "smtp.gmail.com"; //host email
        $mail->SMTPDebug = 2;
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = "noreply@sweng-academy.com"; //user email
        $mail->Password = "12345"; //password email 
        $mail->SetFrom("noreply@sweng-academy.com","Contoh Nama"); //set email pengirim
        $mail->Subject = "Hi. $emailtuju" ; //subyek email
        $mail->AddAddress($emailtuju);  // email tujuan
        $mail->MsgHTML("Your account is successfully created <br> Please Enjoy <br> Fadel Nur Akhmad Team"); //pesan


        if($mail->Send()){
          echo "<script>alert('Kirim Pesan Sukses')</script>";
          echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        }else{
          echo "<script>alert('GAGAL')</script>";
          echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        }
    }

    function inputValidation($email, $password)
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

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

    function signin($email, $password){
        
        if (isset($_SESSION['nama'])) {
            header("Location: dahsboard.php");
        }

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['nama'] = $row['nama'];
                header("Location: dashboard.php");
            } else {
                echo "<script>alert('Maaf! Email atau Password Salah.')</script>";
            }
        }
    }
}


?>

<!DOCTYPE html>
<html>

<head>
	<title>Sign Up User Baru</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

	<div class="container">
		<div class="col-lg-8">
			<div class="page-header">
				<br>
				<h3>Register User Baru</h3>
			</div>
			<form action="" method="post">
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control">
				</div>
				<div class="form-group">
					<input type="submit" name="Kirim" value="Sign Up" class="btn btn-primary">
				</div>
			</form>
		</div>
	</div>

</body>

</html>
<!-- Elseif Channel -->