<?php
session_start(); //memulai eksekusi sesion pada server
 include "No4_db_conn.php"; //menghubungkan kepada file db_conn.php agar dapat tersambung ke database
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['re_password'])){ //sebagai parameter data name, email, password dan re-password
    function validate($data){ 
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']); //melakukan validasi data email
    $password = validate($_POST['password']); //melakukan validasi data password
    $re_password = validate($_POST['re_password']); //melakukan validasi data repasword
    $name = validate($_POST['name']); //melakukan validasi data name

    $user_data = 'email='. $email. '&name='. $name; //menampung parameter data email dan name pada variable "user data"
  

    if (empty($name)){ //pengecekan kondisi inputan nama sudah di isi atau belum
        header("Location: No4_signup.php?error=User name is required&$user_data");
    exit();
     }
     else if(empty($email)){ //pengecekan kondisi inputan email sudah di isi atau belum
        header("Location: No4_signup.php?error=email is required&$user_data");
    exit();
    }
    else if(empty($password)){ //pengecekan kondisi inputan password sudah di isi atau belum
        header("Location: No4_signup.php?error=Password is required&$user_data");
    exit();
    }
    else if(empty($re_password)){ //pengecekan kondisi inputan re-password sudah di isi atau belum
        header("Location: No4_signup.php?error=re_password is required&$user_data");
    exit();
    }
    else if($password !== $re_password){ //pengecekan kondisi password dan re password sudah sama atau belum
        header("Location: No4_signup.php?error=The confirmation password does not match&$user_data");
    exit();
    }
   else if (empty($email) || empty($password)) { //pengecekan kondisi inputan email dan password sudah di isi atau belum
    header("Location: No4_signup.php?error=Username or password is empty!&$user_data");
    exit();
       
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //pengecekan kondisi yang diinputkan harus email
        header("Location: No4_signup.php?error=Invalid email format!&$user_data");
        exit();
    }
    else if (strlen($password) < 6) { //pengecekan kondisi password minimal harus 6 karakter
        header("Location: No4_signup.php?error=Your Password Must Contain At Least 6 Characters!&$user_data");
        exit();
    }
    //penecekan kondisi password harus terdapat satu huruf kapital dan satu buah angka
    else if (!preg_match("#[0-9]+#", $password) && !preg_match("#[A-Z]+#", $password)) { 
        header("Location: No4_signup.php?error=Your Password Must Contain At Least 1 Number or capital letter!&$user_data");
        exit();
    }
    else{

        // hashing the password
    $password = md5($password);
    $sql = "SELECT * FROM users WHERE name='$name'"; // program php sebagai koneksi dengan database
    $result = mysqli_query($conn, $sql);
    
         if (mysqli_num_rows($result) > 0){
            header("Location: No4_signup.php?error=The username is taken try another&$user_data");
            exit();
    }else{ 
        // melakukan penginputan data ke dalam database.
        $sql2 = "INSERT INTO users(name, email, pass ) VALUES('$name', '$email', '$password')";
        $result2 = mysqli_query($conn, $sql2);
        if($result2){ //pengecekan kondisi jika sudah sesuai dan sukses
            header("Location: No4_signup.php?success=your account has been created successfully");
            exit();
        }else{ //pengecekan kondisi jika terdapat kesalahan
            header("Location: No4_signup.php?error=uncknown error occurred&$user_data");
            exit();
        }
    }
      }
}else{
    // Menuju ke halaman signin.php
     header("Location: No4_signup.php");
    exit();
}

?>