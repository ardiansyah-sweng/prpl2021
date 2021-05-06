<?php

session_start();

include("auth/auth.php");

$user = new database();

if (!$_SESSION['login'] === true) {
    header(("location: login.php"));
}

if (isset($_POST['title'])) {
    $s = str_replace(' ', '+', $_POST['title']);
    $title = str_replace(':', '%3A', $s);

    $getAPI = file_get_contents('https://www.omdbapi.com/?apikey=36bcaa6b&t=' . $title);
    $data = json_decode($getAPI, true);
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
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?= $data["Poster"]; ?>" alt="..." style="width: 180px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data['Title']; ?></h5>
                        <p class="card-text"><?= $data['Year']; ?></p>
                        <p class="card-text"><?= $data['Plot']; ?></p>
                        <p class="card-text"><small class="text-muted">Genre : <?= $data["Genre"]; ?></small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>