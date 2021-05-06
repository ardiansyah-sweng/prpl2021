<?php

    // memanggil koneksi
    include 'functions/koneksi.php';

    if (isset($_POST['submit'])) {
        $email      = $_POST['email'];
        $password   = $_POST['password'];

        // Function login 
        $queryLogin     = $pdo->query("SELECT * FROM akun WHERE email='$email' AND password='$password' AND status='Aktif'"); // Query Loginnya
        $rowsLogin      = $queryLogin->rowCount();
        $resultLogin    = $queryLogin->fetch(PDO::FETCH_ASSOC);

        if ($rowsLogin > 0){ // Jika email & passwordnya ada, maka program di bawah ini akan di jalankan
            session_start(); // memulai session login
            $_SESSION['id_akun']    = $resultLogin['id_akun'];
            $_SESSION['email']      = $resultLogin['email'];
            $_SESSION['password']   = $resultLogin['password'];

            echo "<script>alert('Hallo, $_SESSION[email]. Welcome to our website'); window.location = 'dashboard.php'</script>"; // Setelah berhasil login akan di arahkan ke link dashboard.php

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

    <title>Sign-In</title>

    <link rel="icon" href="images/icon.png">

    <link rel="stylesheet" href="plugins/css/bootstrap.css">
    <link rel="stylesheet" href="plugins/css/font-awesome.min.css">
</head>

<body class="bg-primary">

    <section class="container bg-primary" style="margin-top: 100px;margin-bottom: 100px;">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-8 col-md-6 col-lg-4 p-4 bg-light rounded-sm shadow text-center">
                <h2 class="text-primary my-2">Hello!</h2>
                <h4 class="my-2 text-warning">Sign in to your account</h4>
                <?php

                    if (isset($_POST['submit'])) {
                        if (empty($resultLogin)) {
                            echo "<div class='alert alert-danger text-left' role='alert'>";
                            echo "<h4 class='alert-heading'><i class='fa fa-exclamation-triangle'></i> FAILED!</h4>";
                            echo "<hr>";
                            echo "<p class='mb-0'>Please enter your email & password correctly!</p>";
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
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-block btn-primary">Sign In <i class="fa fa-sign-in"></i></button>
                        <p class="my-2 text-center">Don't have an account?</p>
                        <a href="sign-up.php" role="button" class="btn btn-block btn-warning">Sign Up <i class="fa fa-edit"></i></a>
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