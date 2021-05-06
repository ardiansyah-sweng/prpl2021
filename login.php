<?php
session_start(); //session starts here//

?>

<html>
<head>
    <link rel="stylesheet" type="text/css"  href="signin.css">
    <title>Login</title>
</head>

<body>


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3>Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="login.php">
                        <fieldset>
                            <div class="form-group"  >
                                <label for="name">Email</label>
                                <input class="form-control" placeholder=" Enter your email" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" placeholder="Enter your password" name="pass" type="password" value="">
                            </div>

                                <center>
                                <input type="submit" value="Sign in" name="login" >
                                <input type="reset" value="Reset">
                                </center>
                        </fieldset>
                    </form>
                </div>
    <div>
        <label for="regis">Don't have an account ?</label>
        <a href="registration.php">Sign Up</a>
    </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>

<?php

include("db_conection.php");

if(isset($_POST['login']))
{
    $user_email=$_POST['email'];
    $user_pass=$_POST['pass'];

    $check_user="select * from users WHERE user_email='$user_email'AND user_pass='$user_pass'";

    $run=mysqli_query($koneksi,$check_user);

    if(mysqli_num_rows($run))
    {
        echo "<script>window.open('dashboard.php','_self')</script>";

        $_SESSION['email']=$user_email;

    }
    else
    {
        echo "<script>alert('Email or password is incorrect!')</script>";
    }
}
?>