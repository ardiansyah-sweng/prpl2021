<?php

/**
 * SignUp
 * @Input parameter: email, password
 * @Output: validation messages or redirect to dashboard page
 * 
 * Contoh penggunaan:
 *      $tes = new SignUp("","");
 *      echo $tes->inputValidation();
 * 
 * Level mendevelop Sign Up yang perlu dicoba
 * 1. From scratch (tanpa class)
 * 2. Using class (OOP)
 * 3. Using framework. i.e. Laravel dengan fitur --auth
 */
class SignUp
{
    public $email;
    public $password;

    function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * TODO
     * Send an email to new user
     */
    function sendEmail()
    {
        //Your code is here
    }
    
    /**
     * inputValidation
     *
     * @return void
     */
    function inputValidation()
    {
        if (empty($this->email) || empty($this->password)) {
            return 'Username or password is empty!';
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format!";
        }
        if (strlen($this->password) < 6) {
            return "Your Password Must Contain At Least 6 Characters!";
        }
        if (!preg_match("#[0-9]+#", $this->password) && !preg_match("#[A-Z]+#", $this->password)) {
            return "Your Password Must Contain At Least 1 Number or capital letter! ";
        }
        session_start();
        $_SESSION['username'] = $this->email;
        header("location: dashboard.php");
    }
}

$tes = new SignUp("","");
echo $tes->inputValidation();