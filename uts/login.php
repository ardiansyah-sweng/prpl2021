<?php 
require_once("Koneksi.php");
$sql_get = "SELECT * FROM user";
$query_admin = mysqli_query($kon,$sql_get);

$results = [];

while ($row = mysqli_fetch_assoc($query_admin)) {
  $results[] = $row;
  #var_dump($results);
}
 ?>
<!DOCTYPE html>
<html>
 <head>
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <style> 
  	body 
  	    {
       background-image: a.jpg
       background-repeat: no-repeat;
        }
  	#card
        {
        background: #fbfbfb;
        border-radius: 8px;
        box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
        height: 410px;
        margin: 6rem auto 8.1rem auto;
        width: 329px;
        }
    #card-content 
        {
        padding: 12px 44px;
        }
    #card-title 
        {
        font-family: "Raleway Thin", sans-serif;
        letter-spacing: 4px;
        padding-bottom: 23px;
        padding-top: 13px;
        text-align: center;
        }
    .underline-title  
        {
        background: -webkit-linear-gradient(right, #CD5C5C, #CD5C5C);
        height: 2px;
        margin: -1.1rem auto 0 auto;
        width: 89px;
        }
    a 
    {
    text-decoration: none;
    }
    label 
    {
    font-family: "Raleway", sans-serif;
    font-size: 11pt;
    }
    #forgot-pass {
    color: #2dbd6e;
    font-family: "Raleway", sans-serif;
    font-size: 10pt;
    margin-top: 3px;
    text-align: right;
    }
    .form 
    {
    align-items: left;
    display: flex;
    flex-direction: column;
    }
    .form-border 
    {
    background: -webkit-linear-gradient(right,#CD5C5C, #CD5C5C);
    height: 1px;
    width: 100%;
    }
    .form-content 
    {
    background: #CD5C5C;
    border: none;
    outline: none;
    padding-top: 14px;
    }
    #signup 
    {
    color: #CD5C5C;
    font-family: "Raleway", sans-serif;
    font-size: 10pt;
    margin-top: 16px;
    text-align: center;
    }
    #submit-btn 
    {
    background: -webkit-linear-gradient(right, #CD5C5C, #CD5C5C);
    border: none;
    border-radius: 21px;
    box-shadow: 0px 1px 8px #24c64f;
    cursor: pointer;
    color: white;
    font-family: "Raleway SemiBold", sans-serif;
    height: 42.3px;
    margin: 0 auto;
    margin-top: 50px;
    transition: 0.25s;
    width: 153px;
    }
    #submit-btn:hover 
    {
    box-shadow: 0px 1px 18px #CD5C5C;
    }
 </style>
 </head>
 <body background="a.jpg"> <div id="card"><div id="card-content">
  <div id="card-title">
    <h2>LOGIN</h2>
    <div class="underline-title"></div>
    <form action="login.php" method="POST" class="form"> <label for="email" style="padding-top:13px" >&nbsp;Email</label>
  <input
   class="form-content"
   type="text"
   name="email"
   autocomplete="on"
   required />
  <div class="form-border"></div>
  <label for="user-password" style="padding-top:22px">&nbsp;Password</label>
  <input
   class="form-content"
   type="password"
   name="password"
   required />
  <div class="form-border"></div>
<a href="#"><legend id="forgot-pass">Forgot password?</legend></a> <button id="submit-btn" type="submit" name="submit" value="LOGIN"><a href="home.php">Login</a></button>
<a href="#" id="sign.php">Don't have account yet?</a> 
</form>
  </div> 
</body>
</html>