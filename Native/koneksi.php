<?php
  $host = "localhost";
  $user = "root";
  $pass = "";
  $database = "phpcrud";
  $koneksi = new mysqli($host,$user,$pass,$database);
  if(mysqli_connect_error()){
    trigger_error('koneksi ke database gagal: ' . mysqli_connect_error(),E_USER_ERROR);
  }
?>
