<!DOCTYPE html>
<html>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        body, h1,h2,h3,h4,h5,h6 {
            font-family: "Montserrat", sans-serif
        }

        p{
            text-align : center;
        }

        .w3-row-padding img {
            margin-bottom: 12px
        }
        /* Set the width of the sidebar to 120px */
        .w3-sidebar {
            width: 120px;
            background: rgb(24, 24, 24);
        }
        /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
        #main {
            margin-left: 120px
        }
        /* Remove margins from "page content" on small screens */
        @media only screen and (max-width: 600px) {
            #main {
                margin-left: 0
            }
        }
    </style>
    <body class="w3-black">
        <!-- Icon Bar (Sidebar - hidden on small screens) -->
        <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
            <!-- Avatar image in top left corner -->
            <a href="#" class="w3-bar-item w3-button w3-padding-large w3-black">
                <i class="fa fa-home w3-xxlarge"></i>
                <p>HOME</p>
            </a>
            <a href="signin.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
                <i class="fa fa-key w3-xxlarge"></i>
                <p>Sign In</p>
            </a>
        </nav>

        <!-- Navbar on small screens (Hidden on medium and large screens) -->
        <div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
            <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
                <a href="#" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
                <a href="#about" class="w3-bar-item w3-button" style="width:25% !important">ABOUT</a>
                <a href="#photos" class="w3-bar-item w3-button" style="width:25% !important">PHOTOS</a>
                <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>
                <a href="signin.php" class="w3-bar-item w3-button" style="width:25% !important">Sign Out</a>
            </div>
        </div>

        <!-- Page Content -->
        <div class="w3-padding-large" id="main">
            <!-- Header/Home -->
            <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
                <h1 class="w3-jumbo"><span class="w3-hide-small">I'm</span> Jangkung Pangestu Aji.</h1>
                <p>Programmer</p>
            </header>

            <!-- Welcome Section -->
            <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
                <p class="text-center">
                    <?php
                    session_start();
                    if (!isset($_SESSION['username'])) {
                        header("Location: signup.php");
                    }
                    echo 'Welcome, '. $_SESSION['username'];
                    ?>
                    <br>
                    Please login first
                    <a href="signin.php">here</a>.
                </p>
            </div>
            <!-- End Welcome Section -->
    
            <!-- Footer -->
            <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
                <i class="fa fa-facebook-official w3-hover-opacity"></i>
                <i class="fa fa-instagram w3-hover-opacity"></i>
                <i class="fa fa-snapchat w3-hover-opacity"></i>
                <i class="fa fa-pinterest-p w3-hover-opacity"></i>
                <i class="fa fa-twitter w3-hover-opacity"></i>
                <i class="fa fa-linkedin w3-hover-opacity"></i>
            </footer>
            <!-- End footer -->
        </div>
        <!-- END PAGE CONTENT -->
    </body>
</html>