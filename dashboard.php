<?php
session_start();

if(!$_SESSION['email']) //

?>

<html>
<head>
    <style>
        body{
            width: 360px;
            background: #ccfff2;
            margin:100px auto;
            padding: 20px 20px;
        }
    </style>
    <title>
        Home
    </title>
</head>
<center>
<body>
<h1>Welcome</h1><br>
<?php
echo $_SESSION['email'];
?>


<h1><a href="logout.php">Logout here</a> </h1>



</body>
</center>
</html>