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
        $to = 'Muhammad Syafiq akmal';
        $subject = 'Your account has created';
        $message = 'Hi, ' . $to . '<br><br>Your account is successfully created.<br><br>Please enjoy<br>Sweng-Academy Team';
        $from = 'akmal.indo789@gmail.com';


        // Sending email
        if (mail($to, $subject, $message)) {
            echo 'Your mail has been sent successfully.';
        } else {
            echo 'Unable to send email. Please try again.';
        }
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