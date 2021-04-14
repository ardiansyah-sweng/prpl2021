<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
<?php
session_start();
require_once ('koneksi.php');

if (isset($_POST['login'])) { //formsubmitted is for execute data from login form

    $error = array(); //array save all error message
    if (empty($_POST['username'])) { // it will notice you if email is empty
        $error[] = 'Silahkan entri Username Anda.';
    } 

    if (empty($_POST['password'])) { // it will notice you if pass is empty
        $error[] = 'Silahkan entri Password Anda ';
    } 
  
  
    if (empty($error))// if no error, it will continue executing variable
    { 
        $username = $conn->real_escape_string($_POST['username']); //real_escape_string to prevent sql injection
    $password = $conn->real_escape_string($_POST['password']);
        $pass = hash('sha256', $password); //to match your hashed pass
    $query = $conn->query("SELECT * FROM log21 WHERE username='$username' and password = '$pass'");   
        $count = $query->num_rows; //count result from your query
    if ($count==1) // if total data = 1 then continue
        { 
        	 $_SESSION = $query->fetch_array();
           
            header("Location:index.php");
          }
          else
        {             
            $msg_error= 'Username / Password anda Salah. Silakan ulangi.';
        }
    
    $conn->close();
    } 
        }
         
  ?>	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-49">
						Login
					</span>
					<?php
        if(isset($msg_error) or !empty($error) ){  //it display when you got error
            if(isset($msg_error)){  
             ?>                         
            <div class="row" style="font-size: 14px; margin-left: 1px; color: red">
              <div class="text-xs-center">
              <strong>Perhatian!</strong> <?php echo $msg_error; ?>
              </div>
                        </div>                                        
        <?php }
                        
                if (!empty($error)){  
              ?>
               <div class="row" style="font-size: 14px; margin-left: 1px; color: red">
                <div class="text-xs-center">
                <strong>Perhatian!</strong>
                <?php  
                foreach ($error as $key => $values) {                           
                echo ''.$values.', ';
                    }
                    ?>   
                </div>  
              </div>
        <?php 
                        }
                      
                                   } 
        ?>

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
							<button type="submit" name="login" class="login100-form-btn">
								Login
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
						
						<a href="daftar.php" class="txt2">
							Daftar Disini
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
