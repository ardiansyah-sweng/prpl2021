<?php
require_once("config.php");
$batasan = 7;

$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batasan) - $batasan : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($connect_history, "SELECT * FROM h_login");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batasan);                          

$tanggal_now = strtotime(date('Y-m-d H:i:s'));
$awal = date('Y-m-d H:i:s', strtotime('-7 day', $tanggal_now));         
$akhir = date('Y-m-d H:i:s');                                           

$data_log_history = mysqli_query($connect_history, "SELECT * FROM h_login WHERE sign_time BETWEEN '$awal' AND '$akhir' limit $halaman_awal, $batasan");
$nomor = $halaman_awal + 1;

?>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: loginsignup.php");
}
echo "<script>alert('Welcome');</script>, ". $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login History</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y="
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css"
      integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <nav
      class="navbar navbar-expand-lg navbar-dark bg-mattBlackLight fixed-top"
    >
      <button class="navbar-toggler sideMenuToggler" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand" href="#">isannnweb</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle p-0"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <i class="material-icons icon">
                person
              </i>
              <span class="text">Account</span>
            </a>
            <div
              class="dropdown-menu dropdown-menu-right"
              aria-labelledby="navbarDropdown"
            >
              <a class="dropdown-item" href="login history.php">Login history</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">Log Out</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <div class="wrapper d-flex">
      <div class="sideMenu bg-mattBlackLight">
        <div class="sidebar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="#" class="nav-link px-2">
                <i class="material-icons icon">
                  dashboard
                </i>
                <span class="text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">User Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2">
                <i class="material-icons icon"> insert_chart </i
                ><span class="text">Charts</span></a
              >
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2">
                <i class="material-icons icon">
                  settings
                </i>
                <span class="text">Settings</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2">
                <i class="material-icons icon">
                  pages
                </i>
                <span class="text">Pages</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2">
                <i class="material-icons icon">
                  computer
                </i>
                <span class="text">Demo</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2 sideMenuToggler">
                <i class="material-icons icon expandView ">
                  view_list
                </i>
                <span class="text">Resize</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="content">
        <main>
          <div class="container-fluid">
            <div class="row">
              <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>History</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    while ($result = mysqli_fetch_array($data_log_history)) {
                  ?>
                  <tr>
                    <td>
                        <p class="font-weight-bold"><?php echo $no++ ?></p>
                    </td>
                    <td>
                        <p><?php echo $result['email'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $result['sign_time'] ?></p>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                </tbody>
              </table>
            </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"
      integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"
      integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI="
      crossorigin="anonymous"
    ></script>
    <script src="./js/script.js"></script>
  </body>
</html>