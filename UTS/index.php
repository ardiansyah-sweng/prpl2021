<?php

session_start();

include("auth/auth.php");

$user = new database();

if (!$_SESSION['login'] === true) {
    header(("location: login.php"));
}

if (isset($_GET['title'])) {
    include("movieAPI.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>DASHBOARD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid ms-5">
            <a class="navbar-brand" href="#">
                <img src="movieIcon.png" alt="" width="30" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav nav-pills mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signInHistory.php">History Login</a>
                    </li>
                </ul>
                <a class="btn btn-outline-danger d-flex me-4" type="submit" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top: 100px;">
        <form action="" method="GET" class="mx-auto" style="width: 20rem;">
            <div class="mb-3 text-center">
                <h2>Search Movie</h2>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="title" placeholder="Title">
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-success" style="width: 10rem;">Cari</button>
            </div>
        </form>

        <?php if (isset($_GET['title'])) : ?>
            <?php if ($film === 'ada') : ?>
                <div class="row row-cols-3">
                    <?php foreach ($data as $film) : ?>
                        <div class="col">
                            <div class="card mb-3 mt-5" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="<?= $film['Poster']; ?>" style="width: 120px;">
                                    </div>
                                    <div class="col">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $film['Title']; ?></h5>
                                            <p class="card-text"><?= $film['Year']; ?></p>
                                            <form action="detailFilm.php" method="POST">
                                                <input type="text" name="title" value="<?= $film['Title']; ?>" hidden>
                                                <button type="submit" name="submit" class="btn btn-success">Detail</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="text-center" style="margin-top: 150px;">
                        <h2><?= $data["Error"]; ?></h2>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>