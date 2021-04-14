<?php
class database
{

    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "login";
    var $koneksi = "";

    function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$this->koneksi) {
            die("Gagal terhubung dengan database : " . mysqli_connect_error());
        }
    }

    function register($email, $password)
    {
        $sql = "SELECT * FROM user WHERE email='$email'";
        $query = mysqli_query($this->koneksi, $sql);

        if (mysqli_num_rows($query) < 1) {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (email, password) VALUE ('$email', '$hash_password')";
            $query = mysqli_query($this->koneksi, $sql);
            if ($query) {
                $_SESSION['login'] = true;

                $to_email = $email;
                $subject = "Your account has created";
                $body = "Welcome \n Your account has created";
                $headers = "From: Admin";

                if (mail($to_email, $subject, $body, $headers)) {
                    header("Location: index.php");
                    exit();
                } else {
                    header("Location: index.php");
                    exit();
                }
            }
        } else {
            $_SESSION['error'] = "Email sudah terdaftar";
        }
    }

    function login($email, $password)
    {
        $sql = "SELECT * FROM user WHERE email='$email'";
        $query = mysqli_query($this->koneksi, $sql);

        if (mysqli_num_rows($query) === 1) {
            $data = mysqli_fetch_array($query);
            if (password_verify($password, $data['password'])) {
                $_SESSION['login'] = true;
                header("Location: index.php");
                exit();
            } else {
                $_SESSION['error'] = "Email/Password salah";
            }
        } else {
            $_SESSION['error'] = "Email/Password salah";
        }
    }
}
