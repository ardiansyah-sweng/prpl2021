<?php

require_once('config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sign Up Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="utama.css">
</head>

<body>
  <section class="container-fluid bg">
    <section class="row justify-content-center">
      <section class="col-12 col-sm-6 col-md-3">
        <form class="form-container" action="index.php" method="POST">
          <div>
            <label for="">Sign Up</label>
            <hr class="mt-2">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1"><b>User Name</b></label>
            <input name="email" id="email" type="email" class="form-control" placeholder="Enter email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1"><b>Password</b></label>
            <input name="password" id="password" type="password" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required title="Must contain at least one number and one uppercase and at least 6 or more characters" required>
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block">Sign Up</button>
        </form>
      </section>
    </section>
  </section>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script type="text/javascript">
    $(function() {
      $('#submit').click(function(e) {

        var valid = this.form.checkValidity();

        if (valid) {

          var email = $('#email').val();
          var password = $('#password').val();

          e.preventDefault();

          $.ajax({
            type: 'POST',
            url: 'process.php',
            data: {
              email: email,
              password: password
            },
            success: function(data) {
              Swal.fire({
                'icon': 'success',
                'title': 'Success',
                'text': 'Welcome, #email',
                'type': 'Success'
              })
              window.location.href = "dashboard.php";
            },
            error: function(data) {
              Swal.fire({
                'icon': 'error',
                'title': 'Errors',
                'text': 'There Were Errors While Saving The Data.',
                'type': 'Error'
              })
            }
          });

        } else {

        }

      });

    });
  </script>
</body>

</html>