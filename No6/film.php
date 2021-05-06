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
                <a class="navbar-brand page-scroll styleA" href="#home">movieku</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link page-scroll" href="log_history.php">log history</a></li>
                    <li class="nav-item"><a class="nav-link page-scroll" onclick="return confirm('Apakah yakin ingin Logout?')" href="signin.php">logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <h1 style="padding-top: 70px;" class="text-center">Search Movie</h1>
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Search title here.." id="input">
                    <button type="button" class="btn btn-outline-primary" id="button-search">Search</button>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center" id="list">
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>