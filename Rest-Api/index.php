<?php
$data = file_get_contents('http://omdbapi.com');
$all = json_decode($data, true)
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Dashboard</title>
</head>
<body>
    


    <!-- Start -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">AnimKu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li>
                    <a class="nav-link active" aria-current="page" href="#">Movies</a>
                </li>
                <li>
                    <a class="nav-link active" aria-current="page" href="#">Series</a>
                </li>
                <li>
                    <a class="nav-link active" aria-current="page" href="#">Anime</a>
                </li>
            </div>
        </div>
    </nav>
    <div class="container">

        <div class="row mt-3 justify-content-center">
            
            <div class="col-md-8">

                <h1 class="text-center">SEARCH ANIME</h1>

                <div class="input-group mb-3">
                    <input type="text" id="search-input" class="form-control" placeholder="Search Anime..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <button class="btn btn-primary" id="search-button" type="submit">Search</button>
                </div>

            </div>

        </div>

        <hr>

        <div class="row" id="movie-list">
            <div class="col-md-3">
                <div class="card mb-4">
                    <img src="``" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">`+ data.Title +`</h5>
                    <h6 class="card-subtitle mb-2 text-muted">`+ data.Year +`</h6>
                    <a href="#" class="btn btn-primary">See More</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- end -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>