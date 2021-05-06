<?php
session_start(); //session starts here

?>

<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="signin.css">
    <title>Registration</title>
</head>

<body>

<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
    <div class="row"><!-- row class is used for grid system in Bootstrap-->
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Registration</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="registration.php">
                        <fieldset>
                            <div class="form-group">
                                <label for="uname">Username</label> 
                                <input class="form-control" placeholder="Username" name="name" type="text" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="name">Email</label>
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="passw">Password</label>
                                <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                            </div>

                            <center>
                                <input  type="submit" value="Sign up" name="register" >
                                <input type="reset" value="Reset">
                            </center>
                        </fieldset>
                    </form>
                    <center><b>Already registered ?</b> <br></b><a href="login.php">Login here</a></center><!--for centered text-->
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>

<?php

include("db_conection.php");
if(isset($_POST['register']))
{
    $user_name=$_POST['name'];
    $user_pass=$_POST['pass'];
    $user_email=$_POST['email'];
     
    if (empty($user_name) || empty($user_email) || empty($user_pass)) {
        echo "Username or password is empty!";
    exit();
    }
    if (strlen($user_pass) < 6) {
        echo"<script>alert('Your Password Must Contain At Least 6 Characters!')</script>";
        exit();
    }
    if (!preg_match("#[0-9]+#", $user_pass) && !preg_match("#[A-Z]+#", $user_pass)) {
        echo"<script>alert('Your Password Must Contain At Least 1 Number or capital letter!')</script>";
        exit();
    }

    $check_email_query="select * from users WHERE user_email='$user_email'";
    $run_query=mysqli_query($koneksi,$check_email_query);

    if(mysqli_num_rows($run_query)>0)
    {
echo "<script>alert('Email $user_email is already exist in our database, Please try another one!')</script>";
exit();
    }

    $insert_user="insert into users (user_name,user_pass,user_email) VALUE ('$user_name','$user_pass','$user_email')";
    if(mysqli_query($koneksi,$insert_user))
    {
        echo"<script>window.open('dashboard.php','_self')</script>";
        $_SESSION['email']=$user_email;
    }

}

?>