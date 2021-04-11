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
        //Your code is here
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