<?php

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from user where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;

		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}


class SignUp_Login
{
    //membuat konneksi ke db dengan oop
    var $host = "localhost";
    var $user = "root";
    var $pass = "";
    var $db = "signupfix";
    var $tbname = "user";
    //fungsi menghubungkan ke db
    function connect()
    {
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        return $con;//dengan kembalian yang nntinya akan dipanggil 
    }
    
    //fungsi validasi sekaligus menyimpan data user dan pass ke db
    function save($username, $password)
    {
        $conn=$this->connect();//pemanggilan fungsi untuk konek ke db
        $user_id = random_num(20);//memanggil fungsi random_num
        //yg digunakan untuk parameter pengecekan tiap akun saat login
        $query = "select * from user where user_name = '$username'";
        
        $result = mysqli_query($conn, $query);
        
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
                $userdataname = mysqli_fetch_assoc($result);
                if($userdataname['user_name'] === $username)
                {
                    
                    echo '<script>alert("fail to signup, username '.$username.' previously registered")</script>';
                }
            }
            else
            {
                $query ="insert into user(user_id, user_name, password) 
                        values
                ('$user_id', '$username', '$password')";
                    
                $q2=mysqli_query($conn, $query);
                    
                if($q2)
                    {
                        $this->sendmail($username);//panggil fungsi untuk mengirim email dgn parameter username
                        return '<script>alert("Account has created, please re-login")
                                document.location="login.php"</script>' ;
                    }
                
                     
            }
            
        }
        else
        {
            echo "error";
        }
    }

        //fungsi mengirim email melalui phpmailer
    function sendmail($username)
    {
        require 'PHPMailer/PHPMailerAutoload.php';
        $email_pengirim = "tesg9310@gmail.com";//email pengirim
        
        $subjek="Your account has created";
        $email_tujuan=$username;//email penerima yg ditangkap dari html
        $name = substr($email_tujuan,0, strpos($email_tujuan, "@"));//nama di bagian email
        $isi="Hi, ".$name. "<br><br>Your account is succesfully created <br><br>Please enjoy :) <br>Adminadmin";//isi

        $mail = new PHPMailer();

        $mail->IsHTML(true);    // set email format to HTML
        $mail->IsSMTP();   // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = $email_pengirim;  // alamat email kamu
        $mail->Password   = "bagus12345";            // password eMail pengirim
        $mail->SetFrom($email_pengirim, 'noreply');  //Siapa yg mengirim email
        $mail->Subject    = $subjek;
        $mail->Body       = $isi;
        $mail->AddAddress($email_tujuan);

            //send email
        if(!$mail->Send()) 
        {

            echo "Eror: ".$mail->ErrorInfo;//error handling
            exit;
        }
        else 
        {
            return 1;
        }
    }

        //fungsi cek user dan pass saat signup
    function cek($username, $password)
    {
        //saat user dan pass empty
        if (empty($username) || empty($password)) 
        {
            return '<script>alert("Username or password is empty!")</script>';
        }
        //saat user tidak sesuai dengan syntak email
        else if (!filter_var($username, FILTER_VALIDATE_EMAIL)) 
        {
            return '<script>alert("Invalid email format!")</script>';
            
        }
//saat pass kurang dari 6
        else if (strlen($password) < 6) 
        {
            return '<script>alert("Your Password Must Contain At Least 6 Characters!")</script>';;
            
        }
        //saat pass harus menggunakan kombinasi angka dan huruf diatur menggunaka pattern
        else if (!preg_match("#[0-9]+#", $password) || !preg_match("#[a-z]+#", $password)) 
        {
            return '<script>alert("Your Password Must Contain At Least 1 Number!")</script>';
        }
            
        else
        {
            echo $this->save($username,$password);//panggil fungsi save dengan parameter yang sudah ditangkap dari html
             //go to index
            
        }
    }

    function login($user_name, $password)
    {
    	$con = $this->connect();
	    	if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
			{

				//read from database
				$query = "select * from user where user_name = '$user_name' limit 1";
				$result = mysqli_query($con, $query);

				if($result)
				{
					if($result && mysqli_num_rows($result) > 0)
					{

						$user_data = mysqli_fetch_assoc($result);
							
						if($user_data['password'] === $password)
						{

							$_SESSION['user_id'] = $user_data['user_id'];
							$userid = $user_data['user_id']; 
							$query ="insert into log_history(user_id, email) 
                        			values
                			('$userid', '$user_name')";
                    
                mysqli_query($con, $query);		
							header("Location: index.php");
							die;
						}
					}
				}
					
						echo "<script>alert('wrong username or password!')</script>";
			}

			else
			{
				echo "<script>alert('wrong username or password!')</script>";
			}


    }




} 
