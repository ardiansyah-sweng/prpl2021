<?php

    
    function inputValidation($username, $password) {
            if (empty($username) || empty($password)) {
                return 'Username or password is empty!';
            }
            if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
                return "Invalid email format!";
            }
            if (strlen($password) < 6) {
                return "Your Password Must Contain At Least 6 Characters!";
            }
            if (!preg_match("#[0-9]+#", $password) && !preg_match("#[A-Z]+#", $password)) {
                return "Your Password Must Contain At Least 1 Number or capital letter! ";
            }
            
            
        }

require_once("connect.php");

if(isset($_POST['register'])){

    $username = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "INSERT INTO users VALUES ('', '$username', '$password')";
    mysqli_query($dbcon, $sql);
    
    header("location: signin.php");
}

?>

<html>  
<head lang="en">  
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Sign Up</title>  
</head>  

<body class="bodylo"> 
    <center> 
    <a href="signin.php"><button class="logout">Cancel</button></a>
            <div class="container">  
                <h3 class="judul">Register</h3> 
                <div class="panel-body">  
                    <form role="form" method="post" action="signup.php"> 
                            <div class="form-group"  >  
                                <input class="form-control" placeholder="Email" name="email" type="text" autofocus>  
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">  
                            </div>        
                                <input class="btn" type="submit" value="Sign Up" name="register">        
                    </form>  
                   
                </div>  
        </div>      
    </center>
</body>  
      
</html>  