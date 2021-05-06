//* UTS PRPL *//
//* Nama  : Muhammad Nauval Fauzi Khatullah *//
//* Nim   : 1900018179 *//
//* Kelas : D *//
//* Soal Ke 4 *//

<?php
include_once('db_connect.php');
$database = new database();
if(isset($_POST['register']))
{
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $nama = $_POST['nama'];
    if($database->register($email,$password,$nama))
    {
      header('location:login.php');
    }
}
 
?>
<!doctype html>
<html lang="en" class="h-100">
  <body class="d-flex flex-column h-100">
<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Sign Up Form</h1>
    <p class="lead">Silahkan Daftarkan Identitas Anda</p>
    <hr/>
    <form method="post" action="">
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" name="email" placeholder="email">
      </div>
    </div>
 
    <div class="form-group row">
      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
      </div>
    </div>
 
 
  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <a href="login.php" class="btn btn-success">Sign In</a>
      <button type="submit" class="btn btn-primary" name="register">Sign Up</button>
    </div>
  </div>
</form>
  </div>
</main>
</body>
</html>