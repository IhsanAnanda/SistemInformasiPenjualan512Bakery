<?php
require('connection.php');
$transaksi = mysqli_query($conn, "SELECT * FROM tb_transaksi ORDER BY no_trans DESC LIMIT 100");

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header('Location: login.php');
}

$username = $_SESSION['username'];
$admin = "Admin";
$_SESSION['no_trans'] = null;
$role = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE username='$username' AND role='$admin'");
$cek = mysqli_num_rows($role);
$_SESSION['old_no_trans'] = null;
$_SESSION['dummyCheck'] = 0;
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">
  	<title>512 Bakery</title>
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  	<!-- Bootstrap core CSS -->
 	<link href="css/bootstrap.min.css" rel="stylesheet">
  	<!-- Material Design Bootstrap -->
  	<link href="css/mdb.min.css" rel="stylesheet">
  	<!-- Your custom styles (optional) -->
  	<link href="css/style.css" rel="stylesheet">
	<style type="text/css">
    th{
    background-color: #1c2331  ;
    color: white;
    padding: 30px;
  }
  table{
    border:  #1c2331   2px solid;
    border-color:  #1c2331  ;
    background-color: #1c2a48;
    color: white;
    border-radius: 5px;
    width: 50%;
    margin: 20px;
    padding: 10px 10px;
    /*table-layout: fixed;*/
  }
  table.fixed { table-layout:fixed; }
  table.fixed td { overflow: hidden; }
  td{
    padding: 20px 30px;
    white-space: nowrap;
  }
  th{
    padding: 10px 20px;
    white-space: nowrap;
  }
  .bg {
      /* The image used */
      background-image: url("bg.jpg");
      /* Full height */
      height: 100%;
      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
  }
    .col-md-10{
      padding-left: 274px;
    }
    .alnright { text-align: right; }
    .table-hover tbody tr:hover td {
    background-color: #5BBEFC;
  }
  .table-padding{
    padding-left: 46px;
  }
  .table.table-sm{
    padding-left: 100px;
  }
  input[type='number']{
    width: 60px;
  }
	</style>
</head>
<body class="bg">
<div class="container-fluid">
<div class="row">
  <div class="col-md-3">
  	<!-- Sidebar -->
    <div class="sidenav-bg rgba-blue-strong">
    <div class="sidebar-fixed position-fixed side-nav fixed elegant-color-dark custom-scrollbar">
      <a class="logo-wrapper waves-effect">
        <center><img src="logo.png" class="img-fluid" alt=""></center>
        <h3 class="white-text"><b>512 Bakery</b></h3>
      </a>

      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-home mr-3"></i>Home</a>
        <a href="cobalagi.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-money-bill-alt mr-3"></i>Input Transaksi</a>
        <a href="cobaview.php" class="list-group-item active waves-effect">
          <i class="fas fa-table mr-3"></i>Data Transaksi</a>
        <a href="cobaview1.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-list-alt mr-3"></i>Daftar Menu</a>
        <a href="cobaview2.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-bread-slice mr-3"></i>Kategori</a>
        <a href="cobalaporan.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-file-pdf mr-3"></i>Laporan Bulanan</a>
        <a href="cobacari.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-search-dollar mr-3"></i>Pencarian Nota</a>
        <a href="cobaview3.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-users mr-3"></i>Karyawan</a>
        <a href="logout.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-sign-out-alt mr-3"></i>Log Out</a>

      </div>
    </div>
    </div>
    <!-- Sidebar -->
  </div>



<!--   content -->
<div class="col-md-10">
  <form action="" method="POST">
  <table class="fixed table-hover">
    <col width="85px"/>
    <col width="120px" />
    <col width="120px" />
    <col width="120px" />
    <col width="110px" />
    <col width="110px" />
    <col width="110px" />
    <col width="80px" />
    <col width="120px" />
    <tr>
      <th colspan="9"><h3><b>Data Transaksi</b></h3></th>
    </tr>
    <tr>
      <th>No. Nota</th>
      <th>Tanggal</th>
      <th>Nama</th>
      <th>Kasir</th>
      <th>Total</th>
      <th>Bayar</th>
      <th>Kembali</th>
      <th>Ket</th>
      <th>Opsi</th>
    </tr>
    <?php
    foreach ($transaksi as $key => $value) {
    ?>
    <tr>
      <td><?php echo $value['no_trans'];?></td>
      <td><?php echo $value['tanggal'];?></td>
      <td><?php echo $value['pelanggan'];?></td>
      <td><?php echo $value['username'];?></td>
      <td>Rp. <?php echo number_format($value['total']);?></td>
      <td>Rp. <?php echo number_format($value['bayar']);?></td>
      <td>RP. <?php echo number_format($value['kembali']);?></td>
      <td><?php echo $value['ket'];?></td>
      <td>
      <a class="fas fa-info fa-lg blue-text mr-2" href="<?php echo "cobaview4.php?no_trans=".$value['no_trans']?>">
      </a>
      <a class="far fa-edit fa-lg green-text mr-2" href="<?php echo "ubahTrans.php?no_trans=".$value['no_trans']?>">

      <?php
      if ($cek > 0) {
      ?>
      <a class="far fa-trash-alt fa-lg red-text mr-2" href="<?php echo "cobahapus3.php?no_trans=".$value['no_trans']?>">
      <?php
      }else{
      ?>
      <?php
      }
      ?>
      </td>
    </tr>
    <?php

    }
    ?>
  </table>
  </form>
  </div>

<!--   /content -->
  </div>
</div> <!-- /container -->


  <!-- SCRIPTS -->
  <script type="text/javascript">
  	$(cobaview.php).ready(function () {
	$('#dtBasicExample').DataTable();
	$('.dataTables_length').addClass('bs-select');
	});
  </script>
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>



</html>

