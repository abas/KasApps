<?php
  include 'koneksi.php';
  $id = $_POST['id'];
  $name = $_POST['name'];
  $nim = $_POST['nim'];

  $total_kas = $_POST['total_kas'];

  $kas=mysqli_query($koneksi,"UPDATE kas SET name = '$name',nim = '$nim',total_kas = '$total_kas' WHERE id = '$id'");
  header('location:index.php');
?>
