<?php 
 require_once "Koneksi.php"; 

 if($user->isLoggedIn()){ 
     header("location: sign-in.php"); 
   } 

if(isset($_POST['kirim'])){ 
     $email = $_POST['email']; 
     $password = $_POST['password']; 

     if($user->login($email, $password)){ 
       header("location: dashboard.php"); 
     } else{ 
        $error = $user->getLastError(); 
         } 
  } 
 ?>


 <!DOCTYPE html>  
 <html>  
   <head> 
     <meta charset="utf-8"> 
      <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8"> 
     <title>Sign in</title> 
     <style type="text/css">
       h2{
        color: solid black;
        margin-top: 15px;
        margin-bottom: 25px;
        padding-top: 15px;
       }
     </style>
     <link rel="stylesheet" href="" media="screen" title="no title" charset="utf-8"> 
   </head> 
   <body> 
     <div class="login-page"> 
      <div class="form"> 
       <form class="login-form" method="post"> 
        <h2>Sign In</h2>
        <hr>
        <?php if (isset($error)): ?> 
          <div class="error"> 
            <?php echo $error ?> 
          </div> 
        <?php endif; ?> 
        <input type="email" name="email" placeholder="email" required/> 
        <input type="password" name="password" placeholder="password" required/> 
        <button type="submit" name="kirim">LOGIN</button> 
        <p class="message">Belum daftar? <a href="sign-up.php">Sign-up</a></p> 
       </form> 
      </div> 
     </div> 
   </body> 
 </html><?php 
 require_once "Koneksi.php"; 

 if($user->isLoggedIn()){ 
     header("location: sign-in.php"); 
   } 

if(isset($_POST['kirim'])){ 
     $email = $_POST['email']; 
     $password = $_POST['password']; 

     if($user->login($email, $password)){ 
       header("location: dasboard.php"); 
     } else{ 
        $error = $user->getLastError(); 
         } 
  } 
 ?>

