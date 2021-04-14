<?php 
   require_once "Koneksi.php"; 
   if($user->isLoggedIn()){ 

     header("location: dashboard.php");  
   }

   if(isset($_POST['kirim'])){ 
     $email = $_POST['email']; 
     $password = $_POST['password']; 
     if($user->registrasi($email, $password)){ 
       $success = true; 
     } else{ 
       $error = $user->getLastError(); 
     } 
   } 

 ?>

 <!DOCTYPE html>  
 <html>  
   <head> 
     <meta charset="utf-8"> 
     <title>Sign Up</title> 
     <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8"> 
   </head> 
   <body> 
     <div class="login-page"> 
      <div class="form"> 
        <form class="register-form" method="post"> 
          <h2>Sign Up</h2>
        <hr>
        <?php if (isset($error)): ?> 
          <div class="error"> 
            <?php echo $error ?> 
          </div> 
        <?php endif; ?> 
        <?php if (isset($success)): ?> 
          <div class="success"> 
            Berhasil mendaftar.<a href="sign-in.php"> Silahkan Sign in</a>. 
          </div> 
        <?php endif; ?>  
         <input type="email" name="email" placeholder="email" required/> 
         <input type="password" name="password" placeholder="password" required/> 
         <button type="submit" name="kirim">Submit</button> 
         <p class="message">Sudah terdaftar? <a href="sign-in.php">Sign-in disini</a></p> 
        </form> 
      </div> 
     </div> 
   </body> 
 </html>  