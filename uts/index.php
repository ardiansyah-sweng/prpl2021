<?php

require_once 'User.php';


if (isset($_POST['submit'])) {
  
  $errorMessage = [];
  
  if (empty($user->validasiUser())) {
    if($user->cekMember($_POST['username'], $_POST['email'])) {
      session_start();
      $_SESSION['nama'] = $_POST['nama_lengkap'];
      header('Location: welcome.php');
    } else {
      $errorMessage[] = "Username atau E-mail sudah terdaftar";
    }
  } else {
    $errorMessage = $user->validasiUser();
  }

  foreach ($errorMessage as $errors) {
    $error = $errors;
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Form Pendaftaran dengan PHP</title>
</head>
<body>
  <h1>PlajariKode - Form Pendaftaran dengan PHP dan MySQL</h1>
  <form action="" method="post" name="form_pendaftaran" autocomplete="off">
    <h4>Form Pendaftaran</h4>
    
    <!-- Pesan error disini -->
    <?php
    if (isset($error)) {
      echo $error;
    }
    ?>

    <label>Username</label><br/>
    <input type="text" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"><br/>
    <label>Password</label><br/>
    <input type="password" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"><br/>
    <label>Confirm Password</label><br/>
    <input type="password" name="confirm_password" value="<?php if (isset($_POST['confirm_password'])) echo $_POST['confirm_password']; ?>"><br/>
    <label>Nama Lengkap</label><br/>
    <input type="text" name="nama_lengkap" value="<?php if (isset($_POST['nama_lengkap'])) echo $_POST['nama_lengkap']; ?>"><br/>
    <label>E-mail</label><br/>
    <input type="text" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"><br/>
    <input type="checkbox" name="terms">I accept terms and condition<br/>
    <button name="submit" type="submit" value="daftar">Daftar</button>
  </form>
</body>
</html>