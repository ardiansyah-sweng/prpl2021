<?php
include "functions.php";        



if(isset($_POST['send']))
{
    //menangkap throw dari html
    $username = $_POST['username'];
    $password = $_POST['password'];
        //instance objek
    $obj = new SignUp_Login();
    echo $obj->cek($username, $password);
}

 ?>


 <!DOCTYPE html>
<html>
<head>

    <title>Signup</title>
</head>
<body>

    <style type="text/css">
    
    #text{

        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
        width: 100%;
    }

    #button{

        padding: 10px;
        width: 100px;
        color: white;
        background-color: cornflowerblue;
        border: none;
    }

    #box{

        background-color: darkseagreen;
        margin: auto;
        width: 300px;
        padding: 20px;
    }


    </style>
<div id="container">
    <div id="box">
        
        <form method="post">
            <div style="font-size: 35px;margin: 10px;color: white;">Signup</div>

            <input id="text" type="text" name="username" ><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" value="Signup" name="send"><br><br>

            <a href="login.php">Click to Login</a><br><br>
        </form>
    </div>
</div>
</body>
</html>