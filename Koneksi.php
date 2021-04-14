<?php 
  try 
      { 
        $koneksi = new PDO('mysql:host=localhost;dbname=prpl_2021', 'root', '', array(PDO::ATTR_PERSISTENT => true)); 
      } 
      catch(PDOException $e) 
      { 
        echo $e->getMessage(); 
      } 
      include_once 'function.php'; 
      $user = new objek($koneksi); 
 ?> 