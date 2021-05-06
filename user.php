<?php
include "config.php";
	class User{
		public $db;
		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
			        exit;
			}
		}

		/*** for signup process ***/
		public function validation($username,$password,$email){
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
			$password = md5($password);
			$sql="SELECT * FROM users WHERE username='$username' OR email='$email'";

			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;

			if ($count_row == 0){
				$sql1="INSERT INTO users SET username='$username', email='$email', password='$password'";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
			}
			else { return false;}

		}

		/*** for login process ***/
		public function check_login($emailusername, $password){
			
			$password = md5($password);
			$sql2="SELECT id from users WHERE email='$emailusername' or username='$emailusername' and password='$password'";

        	$result = mysqli_query($this->db,$sql2);
        	$user_data = mysqli_fetch_array($result);
        	$count_row = $result->num_rows;

	        if ($count_row == 1) {
	            $_SESSION['sign in'] = true;
	            $_SESSION['id'] = $user_data['id'];
	            return true;
	        }
	        else{
			    return false;
			}
    	}
    
    		public function get_username($id){
    		$sql3="SELECT username FROM users WHERE id = $id";
	        $result = mysqli_query($this->db,$sql3);
	        $user_data = mysqli_fetch_array($result);
	        echo $user_data['username'];
    	}

    	/*** starting the session ***/
	    public function get_session(){
	        return $_SESSION['sign in'];
	    }

	    public function user_logout() {
	        $_SESSION['sign in'] = FALSE;
	        session_destroy();
	    }
	}
?>