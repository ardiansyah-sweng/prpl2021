<?php

    // memanggil koneksi
    include 'functions/koneksi.php';

    // Di bawah ini fungsi untuk memanggil link
    $cek_link   = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $linknya    = explode("sign-up.php", $cek_link);

    if (isset($_POST['submit'])) { // Jika sudah melakukan submit pendaftaran, maka program ini akan di jalankan

        // Di bawah ini untuk menampung inputan form yang diisi
        $email      = $_POST['email'];
        $password   = $_POST['password'];
        $status     = "Pending";

        // Fungsi untuk mengecek apakah emailnya sudah pernah di daftarkan atau belum
        $queryLogin     = $pdo->query("SELECT email FROM akun WHERE email='$email'");
        $rowsLogin      = $queryLogin->rowCount();
        $resultLogin    = $queryLogin->fetch(PDO::FETCH_ASSOC);

        // Jika emailnya belum pernah di daftarkan, maka boleh melakukan registrasi & program di bawah ini akan di jalankan
        if ($rowsLogin == 0){
            try {

                // fungsi untuk menambah data ke dalam databse
                $stmt = $pdo->prepare("INSERT INTO akun
                        (email,password,status)
                        VALUES(:email,:password,:status)" );
                            
                $stmt->bindParam(":email", $email, PDO::PARAM_STR);
                $stmt->bindParam(":password", $password, PDO::PARAM_STR);
                $stmt->bindParam(":status", $status, PDO::PARAM_STR);

                $count = $stmt->execute();

                $insertId = $pdo->lastInsertId();
                
            }catch(PDOException $e){
                echo "<script>window.alert('Failed to input, please contact our team!'); window.location(history.back(-1))</script>";
                exit();
            }

            // Program di bawah ini digunakan untuk mengirim link aktivasi ke email yang di gunanakn untuk mendaftar
            try {
                $to_email   = $email;
                $subject    = "Aktivasi Email";
                $body       = "Silahkan klik link ini untuk melakukan aktivasi: ";
                $body       .= $linknya[0]."success.php?akun=$insertId&email=$email&status=Aktif";
                $headers    = "From: aktivasi.email@example.com";
             
                if (mail($to_email, $subject, $body, $headers)) {
                    echo "<script>window.location = 'success.php?akun=$insertId&email=$email&status=Pending'</script>"; // jika berhasil mengirim email, maka akan di arahkan ke halaman ini
                } else {
                    echo("Email sending failed...");
                }
            } catch (PDOException $e) {
                echo "Gagal kirim email";     
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">

    <title>Sign Up</title>

    <link rel="icon" href="images/icon.png">

    <link rel="stylesheet" href="plugins/css/bootstrap.css">
    <link rel="stylesheet" href="plugins/css/font-awesome.min.css">
</head>

<body class="bg-primary">

    <section class="container bg-primary" style="margin-top: 100px;margin-bottom: 100px;">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-8 col-md-6 col-lg-4 p-4 bg-light rounded-sm shadow text-center">
                <h2 class="text-primary my-2">Join With Us!</h2>
                <h6 class="my-2 text-warning text-left"><i class="fa fa-info-circle"></i> Create your account!</h6>
                <?php

                    if (isset($_POST['submit'])) {
                        if (!empty($resultLogin)) {
                            echo "<div class='alert alert-danger text-left' role='alert'>";
                            echo "<h4 class='alert-heading'><i class='fa fa-exclamation-triangle'></i> GAGAL!</h4>";
                            echo "<hr>";
                            echo "<p class='mb-0'>Email already registered! Please use another email.</p>";
                            echo "</div>";
                        }
                    }

                ?>
                <hr />
                <form method="POST" action="" class="text-left text-primary">
                    <div class="form-group">
                        <label for="email font-weight-bold"><i class="fa fa-envelope"></i> Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email ..." required>
                    </div>
                    <div class="form-group">
                        <label for="password font-weight-bold"><i class="fa fa-key"></i> Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter the password ..." required>
                    </div>
                    <hr />
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-block btn-primary">Sign Up <i class="fa fa-edit"></i></button>
                        <p class="my-2 text-center">Already have an account?</p>
                        <a href="index.php" role="button" class="btn btn-block btn-warning">Sign In <i class="fa fa-sign-in"></i></a>
                    </div>
                </form>

            </div>
        </div>
    </section>

    <script src="plugins/js/jquery.min.js"></script>
    <script src="plugins/js/popper.js"></script> 
    <script src="plugins/js/bootstrap.min.js"></script>

    <script type="text/javascript">

        // Popover
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
        });
        // Popover

    </script>

</body>
</html>