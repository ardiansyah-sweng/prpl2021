<?php 
  try 
      { 
           $koneksi = new PDO('mysql:host=localhost;dbname=user', 'root', '', array(PDO::ATTR_PERSISTENT => true)); 
      } 
      catch(PDOException $e) 
      { 
           echo $e->getMessage(); 
      } 
      include_once 'function.php'; 
      $user = new objek($koneksi); 
 ?> 