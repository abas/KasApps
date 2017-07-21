<?php
  include 'koneksi.php';
  $id = $_POST['id'];
  $name = $_POST['name'];
  $nim = $_POST['nim'];
  $last_add = $_POST['last_add'];

  $total = $_POST['total_kas']+$_POST['last_add'];
  $kas=mysqli_query($koneksi,"UPDATE kas SET name = '$name',nim = '$nim',total_kas = '$total',last_add='$last_add' WHERE id = '$id'");
  header('location:index.php');
?>
