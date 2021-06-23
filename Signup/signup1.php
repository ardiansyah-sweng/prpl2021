<?php

require_once("index.php");
require_once("regissignup.php");
require_once("dashboard.php");
require_once("signin.php");
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
  <link rel="stylesheet" href="sign.css">
</head>
<body>
<form class="box">
        <div id="login">   
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
          <input type="submit" value="Sign Up" onlick="sign.php()" />
        </label>

</body>          
          </form>
            <?php 
                if(isset($_POST['Sign Up'])){
                    include"proses.php";
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $cek_user = mysqli_query($conn,"SELECT * FROM login WHERE username='$username'");
                    $row = mysqli_num_rows($cek_user);

                    if($row==1){
                      $fetch_password = mysqli_fetch_assoc($cek_user['password']);
                      if($fetch_password <> $password){
                        echo"<script>alert('Username salah');</script>";
                      }else{
                        echo"<script>alert('Sign Up Berhasil');</script>";
                      }
                    }else{
                      echo"<script>alert('Username salah atau belum terdaftar');</script>";
                    }
                }
            ?>
        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->