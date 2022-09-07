<?php
require('connection.php');
$id_kategori = $_GET['id_kategori'];
$result = mysqli_query($conn,"DELETE FROM tb_kategori WHERE id_kategori='$id_kategori'");
header('Location: cobaview2.php');

 ?>