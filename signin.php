
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <title>Hello, world!</title>
  </head>
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }
    body {
      background: rgb(221, 218, 218);
    }
    .row {
      box-shadow: 12px 12px 22px grey;
    }
    span {
      color: darkorange;
    }
    .log {
      background-color: rgb(90, 77, 77);
    }
    h1 {
      font-size: 45px;
      color: white;
      font-weight: 800;
    }
    .form-control {
      background-color: gray;
      color: white;
      border: none;
      outline: none;
      padding: 23px 10px;
    }
    .form-control:focus {
      background-color: rgb(65, 56, 56);
      outline: none;
      color: white;
    }
    .btn1 {
      background: orange;
      color: white;
      outline: none;
      border: none;
      border-radius: 50px;
      height: 50px;
      width: 110px;
    } 
    a {
      color: yellow;
      cursor: pointer;
      padding: 10px;
    }
   
  </style>

  <body>
    <section class="login">
      <div class="container py-5 text-center text-white">
        <!-- no-gutters // Menyambungkan sisi kanan dan kiri -->
        <div class="row no-gutters">
          <!-- sisi kanan -->
          <div class="col-lg-8 py-5 log">
            <div class="row1">
              <div class="col-lg-7 mx-auto">
                <h1><span>Member</span> login</h1>
                <p>Selamat datang, Silahkan login</p>

                <form class="pt-4" action="conn_signin.php" method="POST">
                <?php if(isset($_GET['error'])){ ?><p class="error"> <?php echo $_GET['error'] ?> </p><?php } ?>                    
 
                  <div class="form-row py-3">
                    <div class="col-lg-12">
                      <input type="email" placeholder="Email" name="email" class="form-control my-3 p-4" />
                   
                    </div>
                  </div>
                  <div class="form-row py-3">
                    <div class="col-lg-12">
                      <input type="password" name="password" placeholder="******" class="form-control my-3 p-4" />
                    </div>
                  </div>

                  <button type="submit" class="btn1 mt-3 mb-5">Login</button>
                  <br />
                  <small
                    >Belum punya akun ?<span><a href="signup.php">Resister Sekarang </a></span></small
                  >
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 no-gutters">
            <!-- ..... -->
            <!-- Gambar bergerak -->
            <!-- ... -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="images/bg1.jpg" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                  <img src="images/bg2.jpg" class="d-block w-100" alt="..." />
                </div>
                <!-- <div class="carousel-item">
                  <img src="img/gambar1.jpg" class="d-block w-100" alt="..." />
                </div> -->
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <!-- Ahir gambar bergerak -->
            <!-- //======// -->
            <!--.....-->
          </div>
        </div>
      </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
