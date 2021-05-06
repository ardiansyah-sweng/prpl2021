<?php 

    include 'conn.php';

    session_start();

    if (empty($_SESSION['id_data_akun']) AND empty($_SESSION['nama'])){
        echo "<script>alert('You don't have access to this place!'); window.location = 'logout.php'</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="bg-light">

    <section class="container mt-4">
        <div class="row justify-content-center mt-4">
            <div class="jumbotron mt-4">
                <h1 class="display-4">Halo, <?= $_SESSION['nama']; ?>!</h1>
                <hr class="my-4">
                <p>if you want to logout, please click the button below!</p>
                <a class="btn btn-primary btn-lg" href="logout.php" role="button">Logout</a>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>