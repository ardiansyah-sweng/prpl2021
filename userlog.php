<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
    exit;
}

require_once 'config.php';



class logHistory {

    private $db;

    function __construct() {
        // connecting to database
        // membuat objek dari class DbConnect
        // ditampung dalam atribut $db
        $this->db = new DbConnect();
    }

    // method yang digunakan ketika user telah memilih option
    // pada time range yang disediakan sehingga menampilkan data
    // yang telah difilter oleh query
    function timeRange($time){
        if($time == 0){
            // query akan menghasilkan nilai 1 apabila terdapat data yang sesuai
            // query akan menghasilkan nilai 0 apabila tidak ada data yang sesuai
            $data = $this->db->conn-> query("SELECT * FROM log_history WHERE sign_in_time > now() - interval 1 hour");
            if(mysqli_num_rows($data) > 0){
                while($d = mysqli_fetch_assoc($data)){
                    $hasil[] = $d;
                }
                return $hasil;
            } else {
                // mengembalikan fungsi array() untuk menghindari error
                // ketika tidak ada yang sesuai
                return array();
            }
            
        } else if($time == 1){
            $data = $this->db->conn-> query("SELECT * FROM log_history WHERE sign_in_time > now() - interval 24 hour");
            if(mysqli_num_rows($data) > 0){
                while($d = mysqli_fetch_assoc($data)){
                    $hasil[] = $d;
                }
                return $hasil;
            } else {
                  return array();
            }
        } else if($time == 2){
            $data = $this->db->conn-> query("SELECT * FROM log_history WHERE sign_in_time > now() - interval 7 day");
            if(mysqli_num_rows($data) > 0){
                while($d = mysqli_fetch_assoc($data)){
                    $hasil[] = $d;
                }
                return $hasil;
            } else {
                return array();
            }
        } else if($time == 3){
            $data = $this->db->conn-> query("SELECT * FROM log_history WHERE sign_in_time > now() - interval 4 week");
            if(mysqli_num_rows($data) > 0){
                while($d = mysqli_fetch_assoc($data)){
                    $hasil[] = $d;
                }
                return $hasil;
            } else {
                return array();
            }
        } else if($time == 4){
            $data = $this->db->conn-> query("SELECT * FROM log_history");
            while($d = mysqli_fetch_assoc($data)){
                $hasil[] = $d;
            }
            return $hasil;
        }
    }

    // method yang digunakan ketika user baru saja membuka
    // halaman signin history
    // tabel akan otomatis terisi dengan semua data yang ada
    // di tabel log_history
    function default(){
        $data = $this->db->conn-> query("SELECT * FROM log_history");
        while($d = mysqli_fetch_assoc($data)){
			$hasil[] = $d;
		}
        return $hasil;
    }

}

$log = new logHistory();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="css/userlog.css">

    <title>SignIn History - buelat.</title>
</head>
<body>
    
    <header>
        <div class="head-container">
          <div class="head-logo">
             <a href="dashboard.php" class="head-brand">
               <img src="images/logo.png" alt="">
             </a>
          </div>
          <div class="nav">
              <a href="dashboard.php" class="nav-item">Home</a>
              <a href="userlog.php" class="nav-item active">SignIn History</a>
              <a href="#" class="nav-item">Contact</a>
              <a href="logout.php" class="nav-item logout">Logout</a>
          </div>
        </div>
      </header>

      <section>
          <div class="table-container">
              <div class="table-wrap">

                  <div class="form-container">

                      <form action="" method="post">
                          <div class="input-form">
                              <label for="dateFrom">Time Range</label>
                              <select class="form" name="time" id="dateFrom">
                                  <option value="0">Last Hour</option>
                                  <option value="1">Last 24 Hour</option>
                                  <option value="2">Last 7 Days</option>
                                  <option value="3">Last 4 weeks</option>
                                  <option value="4">All Time</option>
                              </select>
                          </div>
                          <div class="input-form btn">
                              <button class="form btn-search" type="submit" name="submit">Search</button>
                          </div>
                      </form>
                  </div>

                  <div class="table-log">
                      <table>
                          <thead>
                              <th>No</th>
                              <th>Email</th>
                              <th>Sign In Time</th>
                          </thead>

                          <tbody>
                            <!-- Ketika halaman baru dimuat -->
                              <?php $i = 1; ?>
                              <?php if(!isset($_POST['submit'])) : ?>
                              <?php foreach($log->default() as $row) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $row["email"]; ?></td>
                                    <td><?= $row["sign_in_time"]; ?></td>
                                </tr>
                              <?php $i++; ?>
                              <?php endforeach; ?>
                              <?php endif; ?>

                            <!-- Jika time range sudah dipilih -->
                              <?php $i = 1; ?>
                              <?php if(isset($_POST['submit'])) : ?>
                              <?php foreach($log->timeRange($_POST['time']) as $row) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $row["email"]; ?></td>
                                    <td><?= $row["sign_in_time"]; ?></td>
                                </tr>
                              <?php $i++; ?>
                              <?php endforeach; ?>
                              <?php endif; ?>
                          </tbody>

                      </table>
                  </div>
              </div>
          </div>
      </section>
</body>
</html>