<?php  
  session_start();  
    if (!isset($_SESSION['username'])) {
    header("Location: signup.php");
  } 
?>
<html>
  <head>
    
    <section class="home" id="home">
        <h1>SELAMAT DATANG</h1>   
        <p><?php echo $_SESSION['username']; ?></p>
    </section>  

  </body>
</html>


