<?php  
    session_start();//session starts here  
?>  
<html>  
        <head lang="en">  
            <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="style.css">
            <title>Sign In</title>  
        </head>  

        <body class="bodylo"> 
            <center> 
                    <div class="panel-heading">  
                        <h3 class="panel-title">Sign In</h3>  
                    </div>  
                    <div class="sign">
                    </div>
                    <div class="container">  
                        <div class="panel-body">  
                            <form role="form" method="post" action="signin.php"> 
                                    <div class="form-group"  >  
                                        <input class="form-control" placeholder="Email" name="email" type="email" autofocus>  
                                    </div>  
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Password" name="password" type="password">  
                                    </div>        
                                        <input class="btn" type="submit" value="Sign In" name="submit" >  
                            </form>  
                            
                        </div>  
                </div>      
            </center>
        </body>     
</html>
<?php  
      
    include("connect.php");  
      
    if(isset($_POST['submit']))  
    {  
        $email=$_POST['email'];  
        $password=$_POST['password'];  
      
        $check_user="select * from users WHERE email='$email'AND password='$password'";  
      
        $run=mysqli_query($dbcon,$check_user);  
      
       $cek=mysqli_num_rows($run);

        if($cek>0){
            $data=mysqli_fetch_assoc($run);
                $_SESSION['email']=$email;
                header("location:signup.php");
        }
        else{  
          echo "<script>alert('Username or password is incorrect!')</script>";  
        }  
    }  
?>