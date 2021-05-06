<?php

session_start();

include("auth/auth.php");

$user = new database();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Sign In History</title>
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
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="signInHistory.php">History Login</a>
                    </li>
                </ul>
                <a class="btn btn-outline-danger d-flex me-4" type="submit" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h1>Sign In History</h1>
        <table class="table mt-4">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Sign In Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $sql = "SELECT * FROM log_history";
                $query = mysqli_query($user->koneksi, $sql);
                ?>
                <?php while ($history = mysqli_fetch_array($query)) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $history['email']; ?></td>
                        <td><?= $history['sign_in_time']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>