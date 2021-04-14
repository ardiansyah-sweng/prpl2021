
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Landing Page</title>
    <link rel="icon" href="assets_dashboard/img/logo.png" type="assets_dashboard/image/x-icon">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="assets_dashboard/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- main css -->
    <link href="assets_dashboard/css/style.css" rel="stylesheet">


    <!-- modernizr -->
    <script src="assets_dashboard/js/modernizr.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div class="pre-container">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
    <!-- end Preloader -->

    <div class="container-fluid">
        <!-- box header -->
        <header class="box-header">
            <div class="box-logo">
                <a href="landingpage.html"><img src="assets_dashboard/img/logo.png" width="80" alt="Logo"></a>
            </div>
            <!-- box-nav -->
            <a class="box-primary-nav-trigger" href="#0">
                <span class="box-menu-text">Menu</span><span class="box-menu-icon"></span>
            </a>
            <!-- box-primary-nav-trigger -->
        </header>
        <!-- end box header -->

        <!-- nav -->
        <nav>
            <ul class="box-primary-nav">
                <li><a href="login.php">Login</a> <i class="ion-ios-circle-filled color"></i></li>

                <li class="box-label">Follow me</li>

                <li class="box-social"><a href="#0"><i class="ion-social-facebook"></i></a></li>
                <li class="box-social"><a href="#0"><i class="ion-social-instagram-outline"></i></a></li>
                <li class="box-social"><a href="#0"><i class="ion-social-twitter"></i></a></li>
                <li class="box-social"><a href="#0"><i class="ion-social-dribbble"></i></a></li>
            </ul>
        </nav>
        <!-- end nav -->

        <!-- box-intro -->
        <section class="box-intro">
            <div class="table-cell">
                <?php
                session_start();
                if (!isset($_SESSION['username'])) {
                    header("Location: signup.php");
                }
                echo 'Welcome, '. $_SESSION['username'];
                ?>
                <h1 class="box-headline letters rotate-2">
                    <span class="box-words-wrapper">
                        <b class="is-visible">selamat.</b>
                        <b>&nbsp;datang.</b>
                        <b>di &nbsp;jk.corp;</b>
                    </span>
		        </h1>
                <h5>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis hic harum cumque saepe qui? Ipsam excepturi voluptates aspernatur sit assumenda ducimus obcaecati quae! Asperiores aspernatur recusandae optio illo hic consequatur?</h5>
            </div>

            <div class="mouse">
                <div class="scroll"></div>
            </div>
        </section>
        <!-- end box-intro -->
    </div>

    <!-- footer -->
    <footer>
        <div class="container-fluid">
            <p class="copyright">© Jangkung Pangestu Aji 2021</p>
        </div>
    </footer>
    <!-- end footer -->

    <!-- back to top -->
    <a href="#0" class="cd-top"><i class="ion-android-arrow-up"></i></a>
    <!-- end back to top -->



    <!-- jQuery -->
    <script src="assets_dashboard/js/jquery-2.1.1.js"></script>
    <!--  plugins -->
    <script src="assets_dashboard/js/bootstrap.min.js"></script>
    <script src="assets_dashboard/js/menu.js"></script>
    <script src="assets_dashboard/js/animated-headline.js"></script>
    <script src="assets_dashboard/js/isotope.pkgd.min.js"></script>


    <!--  custom script -->
    <script src="assets_dashboard/js/custom.js"></script>

</body>

</html>