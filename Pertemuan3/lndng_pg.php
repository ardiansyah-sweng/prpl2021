<?php  
  session_start();  
    if (!isset($_SESSION['username'])) {
    header("Location: index.php");
  } 
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/cssqu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="icon" type="icon/png" href="img/lego.ico">
    

    <title>Dashboard</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark fixed-top scrolling-navbar" style="background-color: rgba(7, 50, 168, 0.5);">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand page-scroll" href="#home" style="">Sendy</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item"><a class="nav-link page-scroll" href="#home">home</a></li>
              <li class="nav-item"><a class="nav-link page-scroll" href="#services">services</a></li>
              <li class="nav-item"><a class="nav-link page-scroll" href="#contact">contact</a></li>
              <li class="nav-item"><a class="nav-link page-scroll" onclick="return confirm('Apakah yakin ingin Logout?')" href="index.php">logout</a></li>
            </ul>
          </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <!-- Home -->
    <section class="home" id="home">
      <div class="container text-center">
        <h1>WELCOME</h1>   
        <p><?php echo $_SESSION['username']; ?></p>
        <p>Lorem ipsum anim cillum sed ut duis officia pariatur dolor nostrud non. Consectetur aliquip in est fugiat et aliqua mollit occaecat esse nulla. Lorem ipsum labore sint ullamco est voluptate nulla occaecat ut aliqua duis voluptate dolore elit. In elit aliquip reprehenderit tempor culpa duis sint quis irure.</p>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
      </div>  
    </section>  
    <!-- End Home -->

    <!-- Services -->
    <section class="services" id="services">
        <div class="container"> 
            <div class="row justify-content-center">
                <div class="col-2 text-center">
                    <h5>SERVICES</h5>
                    <hr class="line">
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-4">
                    <img src="img/ser/p.png">
                    <h6>WEB DESIGN</h6>
                    <p>Make better web design than your competitor with simple look but perfect and modern.</p>
                </div>
                <div class="col-4">
                    <img src="img/ser/vid.png">
                    <h6>VIDEO MAKER</h6>
                    <p>Make awesome and professional video to promote your brand, bussines or your company. </p>
                </div>
                <div class="col-4">
                    <img src="img/ser/pnc.png">
                    <h6>PHOTO EDITOR</h6>
                    <p>Edit your photos faster and nicely</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services -->

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
  </body>
</html>