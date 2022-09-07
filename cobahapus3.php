<?php 
require('connection.php');
$no_trans = $_GET['no_trans'];
$delete = mysqli_query($conn, "DELETE FROM tb_transaksi WHERE no_trans='$no_trans'");
// $delete1 = mysqli_query($conn, "DELETE FROM tb_detail_transaksi WHERE no_trans='$no_trans'");
header('Location: cobaview.php');

 ?>
