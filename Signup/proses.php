<?php

    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    if(!empty($username)){
        if(!empty($password)){
            $host="localhost";
            $username="root";
            $password="";
            $dbname="signin";

            $conn = new mysqli ($host, $username, $password, $dbname);

            if(mysqli_connect_error()){
                die('Connect Error ('.mysqli_connect_error().')'
                .mysqli_connect_error());
            }
            else{
                $sql="INSERT TO upgrade (Username, Password)
                values ('$username','$password')";
                if($conn->query($sql)){
                    echo "New Record Success";
                }else{
                    echo "Error".$sql."<br>".$conn->error;
                }
                $conn->close();   
            }
        } else{
            echo "Password should not be empty";
            die();
        }
    }
    else{
        echo "Username Should not be empty";
        die();
    }
?>