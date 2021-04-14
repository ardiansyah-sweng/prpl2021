<?php 
 require_once "Koneksi.php"; 

   if(!$user->isLoggedIn()){ 
     header("location: sign-in.php"); 
   } 

 $currentUser = $user->getUser(); 
 ?>

 <!DOCTYPE html>  
 <html>  
   <head> 
     <meta charset="utf-8"> 
     <title>Dashboard</title> 
     <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8"> 
   </head> 

   <body>
   <h1>Dashboard</h1>
   <center> 
     <div class="container"> 
       <div class="info"> 
         <h1><b >Selamat Datang <?php echo $currentUser['email'] ?></b></h1> 
       </div> 
       <a href="log-out.php"><button type="button">Logout</button></a> 
     </div>
     </center> 
   </body> 
 </html>