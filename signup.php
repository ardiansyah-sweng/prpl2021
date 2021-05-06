<?php
include "functions.php";        

class SignUp
{
    //membuat konneksi ke db dengan oop
    var $host = "localhost";
    var $user = "root";
    var $pass = "";
    var $db = "signupfix";
    var $tbname = "user";
    //fungsi menghubungkan ke db
    function connect()
    {
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        return $con;//dengan kembalian yang nntinya akan dipanggil 
    }
    
    //fungsi validasi sekaligus menyimpan data user dan pass ke db
    function save($username, $password)
    {
        $conn=$this->connect();//pemanggilan fungsi untuk konek ke db
        $user_id = random_num(20);//memanggil fungsi random_num
        //yg digunakan untuk parameter pengecekan tiap akun saat login
        $query = "select * from user where user_name = '$username'";
        
        $result = mysqli_query($conn, $query);
        
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
                $userdataname = mysqli_fetch_assoc($result);
                if($userdataname['user_name'] === $username)
                {
                    
                    echo '<script>alert("fail to signup, username '.$username.' previously registered")</script>';
                }
            }
            else
            {
                $query ="insert into user(user_id, user_name, password) 
                        values
                ('$user_id', '$username', '$password')";
                    
                $q2=mysqli_query($conn, $query);
                    
                if($q2)
                    {
                        $this->sendmail($username);//panggil fungsi untuk mengirim email dgn parameter username
                        return '<script>alert("Account has created, please re-login")
                                document.location="login.php"</script>' ;
                    }
                
                     
            }
            
        }
        else
        {
            echo "error";
        }
    }

        //fungsi mengirim email melalui phpmailer
    function sendmail($username)
    {
        require 'PHPMailer/PHPMailerAutoload.php';
        $email_pengirim = "tesg9310@gmail.com";//email pengirim
        
        $subjek="Your account has created";
        $email_tujuan=$username;//email penerima yg ditangkap dari html
        $name = substr($email_tujuan,0, strpos($email_tujuan, "@"));//nama di bagian email
        $isi="Hi, ".$name. "<br><br>Your account is succesfully created <br><br>Please enjoy :) <br>Adminadmin";//isi

        $mail = new PHPMailer();

        $mail->IsHTML(true);    // set email format to HTML
        $mail->IsSMTP();   // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = $email_pengirim;  // alamat email kamu
        $mail->Password   = "bagus12345";            // password eMail pengirim
        $mail->SetFrom($email_pengirim, 'noreply');  //Siapa yg mengirim email
        $mail->Subject    = $subjek;
        $mail->Body       = $isi;
        $mail->AddAddress($email_tujuan);

            //send email
        if(!$mail->Send()) 
        {

            echo "Eror: ".$mail->ErrorInfo;//error handling
            exit;
        }
        else 
        {
            return 1;
        }
    }

        //fungsi cek user dan pass saat signup
    function cek($username, $password)
    {
        //saat user dan pass empty
        if (empty($username) || empty($password)) {
            return '<script>alert("Username or password is empty!")</script>';
        }
        //saat user tidak sesuai dengan syntak email
        else if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            return '<script>alert("Invalid email format!")</script>';
            
        }
//saat pass kurang dari 6
        else if (strlen($password) < 6) {
            return '<script>alert("Your Password Must Contain At Least 6 Characters!")</script>';;
            
        }
        //saat pass harus menggunakan kombinasi angka dan huruf diatur menggunaka pattern
        else if (!preg_match("#[0-9]+#", $password) || !preg_match("#[A-Z]+#", $password)) {
            return '<script>alert("Your Password Must Contain At Least 1 Number or capital letter!")</script>';
            
        }
        else
        {
            echo $this->save($username,$password);//panggil fungsi save dengan parameter yang sudah ditangkap dari html
             //go to index
            
        }
    } 
}

if(isset($_POST['send']))
{
    //menangkap throw dari html
    $username = $_POST['username'];
    $password = $_POST['password'];
        //instance objek
    $obj = new SignUp();
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