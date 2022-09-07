<?php 
require('connection.php');

$delete = mysqli_query($conn, "DELETE FROM tb_dummy");
header('Location: cobalagi.php');

 ?>
