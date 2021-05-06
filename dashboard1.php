<<<<<<< HEAD
<?php  
  session_start();  
    if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
  } 
?>

<html>
  <head>
   

    <!-- Home -->
    <section id="home" >
        <h1>WELCOME</h1>   
        <p><?php echo $_SESSION['username']; ?></p>
    </section>  
    <!-- End Home -->

  </body>
=======
<?php  
  session_start();  
    if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
  } 
?>

<html>
  <head>
   

    <!-- Home -->
    <section id="home" >
        <h1>WELCOME</h1>   
        <p><?php echo $_SESSION['username']; ?></p>
    </section>  
    <!-- End Home -->

  </body>
>>>>>>> fee4aef29bd39805de96c59a98e6710fe5dd008f
</html>