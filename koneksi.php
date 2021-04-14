<?php 
class database{
	var $host = "localhost";
	var $email = "root";
	var $password = "";
	var $database = "database_user";
	var $koneksi;

	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->email, $this->password,$this->database);
	}


	function register($email,$password,$nama)
	{	
		$insert = mysqli_query($this->koneksi,"insert into tb_user values ('','$email','$password','$nama')");
		return $insert;
	}

	function login($email,$password,$remember)
	{
		$query = mysqli_query($this->koneksi,"select * from tb_user where username='$email'");
		$data_user = $query->fetch_array();
		if(password_verify($password,$data_user['password']))
		{
			
			if($remember)
			{
				setcookie('email', $email, time() + (60 * 60 * 24 * 5), '/');
				setcookie('nama', $data_user['nama'], time() + (60 * 60 * 24 * 5), '/');
			}
			$_SESSION['email'] = $email;
			$_SESSION['nama'] = $data_user['nama'];
			$_SESSION['is_login'] = TRUE;
			return TRUE;
		}
	}

	function relogin($email)
	{
		$query = mysqli_query($this->koneksi,"select * from tb_user where email='$email'");
		$data_user = $query->fetch_array();
		$_SESSION['email'] = $email;
		$_SESSION['nama'] = $data_user['nama'];
		$_SESSION['is_login'] = TRUE;
	}
} 
?>