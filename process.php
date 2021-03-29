<?php

require_once('config.php');

if (isset($_POST)) {
  $email = $_POST['email'];
  $pass = $_POST['password'];

  $sql = "INSERT INTO data_user (email, password) VALUES (?,?)";
  $stminsert = $db->prepare($sql);
  $result = $stminsert->execute([$email, $pass]);
}else{
  echo 'No Data';
}
