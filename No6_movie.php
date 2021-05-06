<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Muli|Sniglet" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <title>JCO Movie</title>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <nav class="navbar navbar-light bg-light">
            <!-- <div class="form-inline"> -->
            <div class="input-group">
              <input type="text" class="form-control" id="keyword" placeholder="Find Movies, TV shows, Celebrities and more..." />
              <div class="input-group-prepend">
                <button class="btn btn-warning text-white font-weight" id="search">Search</button>
              </div>
            </div>
            <!-- </div> -->
          </nav>
        </div>
      </div>
    </nav>

    <div class="container">
      <!-- <div class="row my-5 text-center">
        <div class="col-sm-12">
          <h3 class="text-title">Movie Search</h3>
        </div>
      </div> -->

      <div class="row mt-5" id="list-movie"></div>
    </div>

    <div class="modal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Detail Film</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="movie.js"></script>
  </body>
</html>
