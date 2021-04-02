<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: signup.php");
}
?>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/cssqu2.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="icon" type="icon/png" href="img/lego.ico">


  <title>Dashboard</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-sm navbar-dark fixed-top scrolling-navbar" style="background-color: rgba(7, 50, 168, 0.5);">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand page-scroll styleA" href="#home">sndyprtn</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link page-scroll" href="#home">home</a></li>
          <li class="nav-item"><a class="nav-link page-scroll" href="#features">features</a></li>
          <li class="nav-item"><a class="nav-link page-scroll" href="#contact">contact</a></li>
          <li class="nav-item"><a class="nav-link page-scroll" onclick="return confirm('Apakah yakin ingin Logout?')" href="signin.php">logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <!-- Home -->
  <section class="home" id="home">
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-5">
          <h1>HALLO</h1>
          <p><?php echo $_SESSION['username']; ?></p>
          <!-- <hr class="col-4 line"> -->
          <h4>Build a website for your business for or project and generate more leads!</h4>
          <button type="submit">Get started</button>
        </div>
        <div class="col-7">
          <img src="img/head.png">
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </div>
  </section>
  <!-- End Home -->

  <!-- features -->
  <section class="features" id="features">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-2 text-center">
          <h5>FEATURES</h5>
          <hr class="line">
        </div>
      </div>
      <div class="row justify-content-center text-center">
        <div class="col-4">
          <img src="img/ser/p.png">
          <h6>Cool UI</h6>
          <p>Make better web design than with simple look but perfect and modern.</p>
        </div>
        <div class="col-4">
          <img src="img/ser/bs.png">
          <h6>Bootstrap 5 Ready</h6>
          <p>Featuring the latest build of the new Bootstrap 5 framework.</p>
        </div>
        <div class="col-4">
          <img src="img/ser/ez.png">
          <h6>Easy to Use</h6>
          <p>Ready to use with your own content, or costumize the source file.</p>
        </div>
      </div>
      <div class="row justify-content-center text-center">
        <div class="col-4">
          <img src="img/ser/res.png">
          <h6>Fully Responsive</h6>
          <p>This theme whill look great on any device, no matter the size.</p>
        </div>
        <div class="col-4">
          <img src="img/ser/co.png">
          <h6>Colorful</h6>
          <p>With right color pallet make more awesome</p>
        </div>
      </div>
    </div>
  </section>
  <!-- End features -->

  <!-- Contact -->
  <section class="contact" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-2 text-center">
          <h5>CONTACT</h5>
          <hr class="line"><br>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-6">
          <form>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" id="name" class="form-control" placeholder="Enter your name">
            </div>
            <div class="form-group">
              <label for="name">Subject</label>
              <input type="text" id="subject" class="form-control" placeholder="Enter subject">
            </div>
            <div class="form-group">
              <label for="name">Message</label>
              <input type="textarea" id="comment" class="form-control" style="height: 100px" placeholder="Enter your message">
            </div>
            <button class="cusbutton" type="submit">SUBMIT</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact -->

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 text-center">
          <p>- &copy; Copyright 2020. Portfolio by sndy prtn -</p>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>