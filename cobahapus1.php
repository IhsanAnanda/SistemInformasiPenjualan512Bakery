<?php
require('connection.php');
$id_menu = $_GET['id_menu'];
$result = mysqli_query($conn,"DELETE FROM tb_menu WHERE kode_menu='$id_menu'");
header('Location: cobaview1.php');

 ?>