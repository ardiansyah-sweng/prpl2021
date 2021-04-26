<?php

// require_once("proses.php");
require_once("regissignup.php");
require_once("datetimemanip.php");
// require_once("sign.php");

// $sql_get = "SELECT * FROM prpl2021";
// $query_data = mysqli_query($koneksi, $sql_get);

// $result = [];

// while($row = mysqli_fetch_assoc($query_dta)){
// 	$result[] = $row; 
// }


// var_dump($result);
// die;

?>
<head>
  <link rel="stylesheet" href="sg.css">
</head>
<body>
<form class="box">
        <div id="login">   
        <!-- <form class="box" action="signup1.php" method="post"> -->
          <!-- <h1>SIGN UP!!!</h1> -->
        <!-- <input type="text" name="" placeholder="Email Adress">
        <input type="password" name="" placeholder="Password">
        <input type="submit" name="" placeholder="Sign up">
        </form>   -->
          <form action="/" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address : 
            </label>
            <input id="email" type="text" required placeholder="Email Adress" required autocomplete="off" />
          </div>
          
          <div class="field-wrap">
            <label>
              Password : 
            </label>
            <input id="pw" type="password" required placeholder="Password" required autocomplete="off" />
          </div>
          <label>
          <a href = "datetimemanip.php">
          <input type="submit" value="Sign In" href="datetimemanip.php" onlick="datetimemanip.php" />
          </a>
        </label>
        <label>
          <a href="signup1.up#">Registrasi!!!</a>
        </label>
</body>          
          </form>
            <?php 
                if(isset($_POST['Sign In'])){
                    echo"Tombol Sign In Jalan";
                }
            ?>
        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->