<?php
session_start(); //memulai eksekusi pada server
include "No4_db_conn.php"; //menghubungkan kepada file db_conn.php agar dapat tersambung ke database
if(isset($_POST['email']) && isset($_POST['password'])){   //sebagai parameter data email dan password 
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $email = validate($_POST['email']); //memvalidasi data email
    $password = validate($_POST['password']); //memvalidasi data password
    if (empty($email)){ //mengecek kondisi email yang diinputkan user sesuai yang ada pada database atau tidak
        header("Location: No4_signin.php?error=User email is required");
    exit();
    }else if(empty($password)){ //mengecek kondisi password yang diinputkan user sesuai yang ada pada database atau tidak
        header("Location: No4_signin.php?error=Password is required");
    exit();
    }else{
        $password = md5($password); 
        $sql = "SELECT * FROM users WHERE email='$email' AND pass='$password'"; // program php sebagai koneksi dengan database

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)===1){
            $row = mysqli_fetch_assoc($result);

            if($row['email']===$email && $row['pass']===$password){
                $_SESSION['email']= $row['email'];
                $_SESSION['name']= $row['name'];
                $_SESSION['id']= $row['id'];
                // Menuju ke halaman No4_signin.php
                header("Location: dashboard.php");
            }
            else{
                header("Location: No4_signin.php?error=Incoreect Username or Password");
                exit();      
            }
        }else{
            header("Location: No4_signin.php?error=Incoreect Username or Password");
            exit();
        }
    }
}else{
    // Menuju ke halaman No4_signin.php
    header("Location: dashboard.php");
    exit();
}

?>