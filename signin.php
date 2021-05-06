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
            <div class="sign">
               Belum punya akun? 
               <a href="signup.php"><button class="signb">Buat akun</button></a>
            </div>
            <div class="container">  
                <h3 class="panel-title">Sign In</h3>  
                <div class="panel-body">  
                    <form role="form" method="post" action="signin.php"> 
                            <div class="form-group"  >  
                                <input class="form-control" placeholder="Email" name="email" type="" autofocus>  
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">  
                            </div>        
                                <input class="btn" type="submit" value="Sign In" name="login" >  
                    </form>  
                    
                </div>  
        </div>      
    </center>
</body>  
      
</html>  
      
<?php  
      
    include("connect.php");  
      
    if(isset($_POST['login']))  
    {  
        $username=$_POST['email'];  
        $password=$_POST['password'];  
      
        $check_user="select * from users WHERE email='$username'AND password='$password'";  
      
        $run=mysqli_query($dbcon,$check_user);  
      
       $cek=mysqli_num_rows($run);

        if($cek>0){
            $data=mysqli_fetch_assoc($run);
                $_SESSION['username']=$username;
                header("location:dashboard.php");
        }
        else{  
          echo "<script>alert('Username or password is incorrect!')</script>";  
        }  
    }  
?>