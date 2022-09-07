<?php 
require('connection.php');
$id = $_GET['id'];
$update = mysqli_query($conn, "SELECT * FROM transaksi WHERE id=$id");
$data = mysqli_fetch_assoc($update);
$temp = $data['plat'];
mysqli_query($conn, "UPDATE mobil SET status='Available' WHERE plat='$temp'");
mysqli_query($conn, "UPDATE transaksi SET keterangan='Selesai', kurang=0 WHERE id='$id'");
header('Location: cobaview.php');

 ?>