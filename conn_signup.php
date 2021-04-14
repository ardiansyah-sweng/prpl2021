<?php
session_start();
 include "db_conn.php";
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['re_password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $re_password = validate($_POST['re_password']);
    $name = validate($_POST['name']);

    $user_data = 'email='. $email. '&name='. $name;
  

    if (empty($name)){
        header("Location: signup.php?error=User name is required&$user_data");
    exit();
     }
     else if(empty($email)){
        header("Location: signup.php?error=email is required&$user_data");
    exit();
    }
    else if(empty($password)){
        header("Location: signup.php?error=Password is required&$user_data");
    exit();
    }
    else if(empty($re_password)){
        header("Location: signup.php?error=re_password is required&$user_data");
    exit();
    }
    else if($password !== $re_password){
        header("Location: signup.php?error=The confirmation password does not match&$user_data");
    exit();
    }
   else if (empty($email) || empty($password)) {
    header("Location: signup.php?error=Username or password is empty!&$user_data");
    exit();
       
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: signup.php?error=Invalid email format!&$user_data");
        exit();
    }
    else if (strlen($password) < 6) {
        header("Location: signup.php?error=Your Password Must Contain At Least 6 Characters!&$user_data");
        exit();
    }
    else if (!preg_match("#[0-9]+#", $password) && !preg_match("#[A-Z]+#", $password)) {
        header("Location: signup.php?error=Your Password Must Contain At Least 1 Number or capital letter!&$user_data");
        exit();
    }


    else{

        // hashing the password
    $password = md5($password);
    $sql = "SELECT * FROM users WHERE name='$name'";
    $result = mysqli_query($conn, $sql);
    
         if (mysqli_num_rows($result) > 0){
            header("Location: signup.php?error=The username is taken try another&$user_data");
            exit();
    }else{
        $sql2 = "INSERT INTO users(name, email, pass ) VALUES('$name', '$email', '$password')";
        $result2 = mysqli_query($conn, $sql2);
        if($result2){
            header("Location: signup.php?success=your account has been created successfully");
            exit();
        }else{
            header("Location: signup.php?error=uncknown error occurred&$user_data");
            exit();
        }
    }
      }
}else{
     header("Location: signup.php");
    exit();
}

?>