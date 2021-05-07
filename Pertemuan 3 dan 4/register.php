<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mari Belajar Coding</title>
  <meta name="author" content="https://www.maribelajarcoding.com/">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <br>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="panel panel-default">
          <div class="panel-heading" align="center">Daftar</div>
          <div class="panel-body">
            <?php
              include "koneksi.php";
              if (isset($_POST['daftar'])) {
                  //ambil data dari form   
                  $Username=$_POST['Username'];
                  $Password=$_POST['Password'];
                  $Nama=$_POST['Nama'];
                  $Email=$_POST['Email'];
                  $Telepon=$_POST['Telepon'];
                  //buat token
                  $token=hash('sha256', md5(date('Y-m-d'))) ;
                  //cek user terdaftar
                  $sql_cek=mysqli_query($koneksi,"SELECT * FROM users WHERE email='".$Email."'");
                  $r_cek=mysqli_num_rows($sql_cek);
                  if ($r_cek>0) {
                    echo '<div class="alert alert-warning">
                            Email anda sudah pernah terdaftar!
                          </div>';
                  }else{
                    //jika data kosong maka insert ke tabel;
                    //aktif =0 user belum aktif
                    $insert=mysqli_query($koneksi,"INSERT INTO users(username,password,nama,email,no_hp,token,aktif) VALUES('".$Username."','".$Password."','".$Nama."','".$Email."','".$Telepon."','".$token."','0')");
                    //include kirim email
                    include("mail.php");

                    if ($insert) {
                        echo '<div class="alert alert-success">
                            Pendaftaran anda berhasil, silahkan cek email anda untuk aktifasi. 
                            <a href="login.php">Login</a>
                          </div>';
                    }

                  }                  
              }

            ?>
            <form class="form-horizontal" method="POST">
              <div class="form-group">
                <label class="control-label col-sm-3" for="Username">Username:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="Username" name="Username">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="Password">Password:</label>
                <div class="col-sm-9">          
                  <input type="password" class="form-control" id="Password" name="Password">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="Nama">Nama:</label>
                <div class="col-sm-9">          
                  <input type="text" class="form-control" id="Nama" name="Nama">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="Email">Email:</label>
                <div class="col-sm-9">          
                  <input type="text" class="form-control" id="Email" name="Email">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="Telepon">Telepon:</label>
                <div class="col-sm-9">          
                  <input type="text" class="form-control" id="Telepon" name="Telepon">
                </div>
              </div>
              <div class="form-group">        
                <div class="col-sm-offset-3 col-sm-9">
                  <button type="submit" name="daftar" class="btn btn-primary btn-block">Daftar</button>
                </div>
              </div>
            </form>
           
          </div>
        </div>      
    </div>
  </div>
</div>
</body>
</html>
