<?php
session_start();
include "db_conn.php";
if(isset($_POST['email']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    if (empty($email)){
        header("Location: signin.php?error=User email is required");
    exit();
    }else if(empty($password)){
        header("Location: signin.php?error=Password is required");
    exit();
    }else{
        $password = md5($password); 
        $sql = "SELECT * FROM users WHERE email='$email' AND pass='$password'";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)===1){
            $row = mysqli_fetch_assoc($result);

            if($row['email']===$email && $row['pass']===$password){
                $_SESSION['email']= $row['email'];
                $_SESSION['name']= $row['name'];
                $_SESSION['id']= $row['id'];
                header("Location: dashboard.php");
            }
            else{
                header("Location: signin.php?error=Incoreect Username or Password");
                exit();      
            }
        }else{
            header("Location: signin.php?error=Incoreect Username or Password");
            exit();
        }
    }
}else{
    header("Location: dashboard.php");
    exit();
}

?>