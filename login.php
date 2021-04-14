<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Log In</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  <main>
    <!-- Alert -->
      <div class="alert alert-warning text-center" role="alert">
        <?php 
        if(isset($_POST['login']))
        {
      
        $email = $_POST['email'];
        $password = $_POST['password'];
      
            if($email && $password)
            {
      
                session_start();
                require_once("koneksi.php");
      
                $login = mysqli_query($koneksi, "SELECT * FROM registrasi WHERE email = '$email' AND password = '$password'");
                $cek = mysqli_num_rows($login);
      
                if($cek==1)
                {
                    $_SESSION['userweb'] = $email;
                    header('location:dashboard/dashboard.html');
                    exit;
                }
                else{
                    echo "Silahkan coba lagi";
                }
            }
        }
        ?>
      </div>
      <!-- Akhir Alert -->

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
            <p><img src="assets/images/logo.png" alt="logo" class="logo">JANGKUNG.CORP</p>
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Log In</h1>
            <form action="login.php" method="POST">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" required="required" name="email" id="email" class="form-control" placeholder="your-email@gmail.com">
              </div>
              <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" required="required" name="password" id="password" class="form-control" placeholder="enter your passsword">
              </div>
              <button name="login" id="login" class="btn btn-block login-btn">Submit</button>
            </form>
            <a href="#!" class="forgot-password-link">Forgot password?</a>
            <p class="login-wrapper-footer-text">Don't have an account? <a href="signup.php" class="text-reset">Register here</a></p>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="assets/images/signup.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>