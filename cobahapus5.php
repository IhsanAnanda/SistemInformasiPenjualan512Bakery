<?php
require('connection.php');
$username = $_GET['username'];
$result = mysqli_query($conn,"DELETE FROM tb_karyawan WHERE username='$username'");
header('Location: cobaview3.php');

 ?>