<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {font-family: Arial, Helvetica, sans-serif;}
            
            .container {
                margin : 10%;
            }

            .alert, h2{
                text-align : center;
            }

            input[type=text], input[type=password] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }

            button {
                color: white;
                border: none;
                cursor: pointer;
                width: 49.8%;
                height : 50px;
                display : inline-block;
            }

            button:hover {
                opacity: 0.8;
            }

            .submitbtn{
                padding: 10px 18px;
                background-color: rgb(0,0,0);
            }

            .cancelbtn {
                padding: 10px 18px;
                background-color: red;
            }

            img.avatar {
                width: 40%;
                border-radius: 50%;
            }

            span.psw {
                float: right;
                padding-top: 16px;
            }

            /* Change styles for span and cancel button on extra small screens */
            @media screen and (max-width: 300px) {
                span.psw {
                    display: block;
                    float: none;
                }
                .cancelbtn {
                    width: 100%;
                }
            }
        </style>
    </head>
    <body>
        <div class="alert" role="alert">
            <?php 
            if(isset($_POST['login']))
            {
        
            $email = $_POST['email'];
            $password = $_POST['password'];
        
                if($email && $password)
                {
        
                    //Koneksi ke database
                    $koneksi = mysqli_connect("localhost", "root", "", "prpl2021");
                    $koneksi2 = mysqli_connect("localhost", "root", "", "sweng2021");
        
                    $login = mysqli_query($koneksi, "SELECT * FROM registrasi WHERE email = '$email' AND password = '$password'");
                    $cek = mysqli_num_rows($login);
        
                    
                    if($cek==1)
                    {
                        date_default_timezone_set('Asia/jakarta');          //Lokasi waktu
                        $log_his = date("y-m-d H:i:s");                     //Format Waktu
    
                        $query = mysqli_query($koneksi2, "SELECT MAX(id) FROM log_history");  //MAX(id) yaitu memilih id paling tinggi 
                        $data = mysqli_fetch_assoc($query);
                        $id = $data['MAX(id)'];
                        $id = $id + 1;
    
                        $sql_insert = "INSERT INTO log_history VALUES('$id', '$email', '$log_his')";
                        mysqli_query($koneksi2, $sql_insert);
                        
                        $_SESSION['userweb'] = $email;
                        header('location:dashboard.php');
                        exit;
                    }
                    else{
                        echo "Silahkan coba lagi";
                    }
                }
            }
            ?>
        </div>

        <div class="container">
            <h2>Login Form</h2>
            <form action="signin.php" method="post">
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Your Email" name="email" required>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Your Password" name="password" required>
                        
                <button name="login" type="submit" class="submitbtn">Login</button>
                <a href="index.html"><button type="button" class="cancelbtn">Cancel</button></a>
            </form>
            <p>Don't have an account?<a href="signup.php">Register here</a></p>
        </div>
    </body>
</html>