//* UTS PRPL *//
//* Nama  : Muhammad Nauval Fauzi Khatullah *//
//* Nim   : 1900018179 *//
//* Kelas : D *//
//* Soal Ke 4 *//

<?php
class database{
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "database_user";
	var $koneksi;
 
	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
	}
 
  
	function register($email,$password,$nama)
	{	
		$insert = mysqli_query($this->koneksi,"insert into tb_user values ('','$nama','$email','$password')");
		return $insert;
	}
 
	function login($email,$password,$remember)
	{
		$query = mysqli_query($this->koneksi,"select * from tb_user where email='$email'");
		$data_user = $query->fetch_array();
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