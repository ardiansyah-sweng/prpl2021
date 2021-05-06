<?php

/**
 * SignUp
 * 
 */
class SignUp
{
    /**
     * Send an email to new user
     */
    function sendEmail()
    {
        
    }

    function inputValidation($email, $password)
    {
        if (empty($email) || empty($password)) {
            return 'Username or password is empty!';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format!";
        }
        if (strlen($password) < 6) {
            return "Your Password Must Contain At Least 6 Characters!";
        }
        if (!preg_match("#[0-9]+#", $password) && !preg_match("#[A-Z]+#", $password)) {
            return "Your Password Must Contain At Least 1 Number or capital letter! ";
        }
        
        session_start();
        $_SESSION['username'] = $email;
        header("location: dashboard.php");
    }
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
                    <div class="panel-heading">  
                        <h3 class="panel-title">Sign Up</h3>  
                    </div>  
                    <div class="sign">
                    </div>
                    <div class="container">  
                        <div class="panel-body">  
                            <form role="form" method="post" action="signup.php"> 
                                    <div class="form-group"  >  
                                        <input class="form-control" placeholder="email" name="emeil" type="email" autofocus>  
                                    </div>  
                                    <div class="form-group">  
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">  
                                    </div>        
                                        <input class="btn" type="submit" value="Sign Up" name="signup" >  
                            </form>  
                            
                        </div>  
                </div>      
            </center>
        </body>  
            
</html>