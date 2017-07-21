<?php
	include "koneksi.php";
	$id=$_GET['id'];
	$kas=mysqli_query($koneksi,"Delete FROM kas WHERE id='$id'");
	header('location:index.php');
?>
