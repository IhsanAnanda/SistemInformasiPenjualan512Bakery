<?php 
require('connection.php');
$kode_menu = $_GET['kode_menu'];
$delete = mysqli_query($conn, "DELETE FROM tb_dummy WHERE kode_menu='$kode_menu'");
header('Location: cobalagi.php');

 ?>
