<?php
  include 'koneksi.php';
  $name = $_POST['name'];
  $nim = $_POST['nim'];
  $total_kas = $_POST['total_kas'];
  mysqli_query($koneksi,"INSERT INTO kas (name,nim,total_kas) VALUES ('$name','$nim','$total_kas')");
  header('location:index.php');
?>
