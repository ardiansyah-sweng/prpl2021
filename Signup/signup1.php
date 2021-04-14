<?php

require_once("index.php");
require_once("regissignup.php");
require_once("dashboard.php");
require_once("sign.php");

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
  <link rel="stylesheet" href="sign.css">
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
              Email Address<span class="req"> : </span>
            </label>
            <input id="email" type="text" required placeholder="Email Adress" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req"> : </span>
            </label>
            <input id="pw" type="password" required placeholder="Password" required autocomplete="off"/>
          </div>
          <label>
          <input type="submit" value="Sign Up" onlick="regissignup.php()" />
        </label>
</body>          
          </form>
            <?php 
                if(isset($_POST['Sign Up'])){
                    echo"Tombol Sign Up Jalan";
                }
            ?>
        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->