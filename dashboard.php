<?php  
  session_start();  
    if (!isset($_SESSION['username'])) {
    header("Location: signup.php");
  } 
?>

<html>
  <head>
   

    <!-- Home -->
    <section class="home" id="home">
        <h1>WELCOME</h1>   
        <p><?php echo $_SESSION['username']; ?></p>
    </section>  
    <!-- End Home -->

  </body>
</html>