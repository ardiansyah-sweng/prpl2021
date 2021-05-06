<?php

class Login
{
  public $email = "";
  public $password = "";

  public function masuk()
  {
    $koneksi = mysqli_connect('localhost', 'root', '', 'prpl') or die($koneksi);
    if (empty($this->email) || empty($this->password)) {
      echo "email or password is empty!";
    }
    session_start();
    $_SESSION['email'] = $this->email;

    if (!empty($this->email) and !empty($this->password)) {
      $sql_query = "SELECT * FROM data_user VALUES('$this->email','$this->password')";
      mysqli_query($koneksi, $sql_query);
      header("location: dashboard.php");
    }
  }
}

$stmt = new Login();
if (isset($_POST['login'])) {
  $stmt->email = $_POST['email'];
  $stmt->password = $_POST['password'];
  $stmt->masuk();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sign Up Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="utama.css">
</head>

<body>
  <section class="container-fluid bg">
    <section class="row justify-content-center">
      <section class="col-12 col-sm-6 col-md-3">
        <form class="form-container" action="" method="POST">
          <div>
            <label for="">Sign In</label>
            <hr class="mt-2">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1"><b>User Name</b></label>
            <input name="email" id="email" type="email" class="form-control" placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1"><b>Password</b></label>
            <input name="password" id="password" type="password" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required title="Must contain at least one number and one uppercase and at least 6 or more characters" required>
          </div>
          <button type="submit" name="login" id="submit" class="btn btn-primary btn-block">Login</button>
        </form>
      </section>
    </section>
  </section>
  </script>
</body>

</html>