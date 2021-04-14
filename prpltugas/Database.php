<?php

class Database {
 var $db_host = 'localhost';
 var $db_user = 'root';
 var $db_pass = '';
 var $db_name = 'login';
 var $con = '';

 public function __construct() {
  $this->con = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

  if(mysqli_connect_errno()) {
   echo "Koneksi gagal : " . mysqli_connect_error();
  }
 }