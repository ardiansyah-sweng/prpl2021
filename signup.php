<?php

/**
 * SignUp
 * 
 */
?>


<?php
class SignUp
{
    /**
     * Send an email to new user
     */
    function sendEmail()
    {
        <!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign up</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sign UP</h1>
    <form action="daftar.php" method="post" enctype="multipart/form-data" >

    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td> <input type="text" name="username" value=""> </td>

        </tr>
        <tr>
            <td>Password </td>
            <td>:</td>
            <td> <input type="password" name="pw" value=""> </td>

        </tr>
    </table>
    <button type="submit" name="submit" >Daftar</button>
</form>


</body>
</html>
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