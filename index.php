<?php
require('connection.php');

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header('Location: login.php');
}

$username = $_SESSION['username'];
$_SESSION['no_trans'] = null;
// menampilkan pesan selamat datang
echo "<script type='text/javascript'>alert('Hai, Selamat Datang $username!');</script>";

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>512 Bakery</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <style>
    body, html {
      height: 100%;
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
    }
    .center{
      margin-top: 80px;
      margin-right: 40px;
    }
    .col-md-9{
      margin-top: 0px;
    }
    .img-fluid{

    }
  </style>
</head>


<body>

<div class="bg">
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
        <a href="index.php" class="list-group-item active waves-effect">
          <i class="fas fa-home mr-3"></i>Home</a>
        <a href="cobalagi.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-money-bill-alt mr-3"></i>Input Transaksi</a>
        <a href="cobaview.php" class="list-group-item list-group-item-action waves-effect">
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
  <div class="col-md-9 ">
    <!-- Jumbotron -->
    <div class="card card-image center " style="background-image: url(jumbo.jpg)">

    <!-- Content -->
    <div class="text-white text-center d-flex align-items-center rgba-black-strong py-4 px-4">
    <div>
      <h5 class="blue-text"><i class="fas fa-pizza-slice"></i> Bakery</h5>
      <h3 class="card-title pt-2"><strong>512 Bakery</strong></h3>
      <p>512 Bakery adalah sebuah toko roti yang sudah berdiri sejak tahun 2005. 512 Bakery beralamat di Jalan Babarsari No. 19, Caturtunggal, Depok, Sleman, Yogyakarta. 512 Bakery memiliki makna toko roti yang terletak di blok 5 nomor 12 Babarsari.</p>
      <h4>Visi</h4>
      <p>Memenuhi Kebutuhan Masyarakat Dalam Bidang Bakery</p>
      <h4>Misi</h4>
      <p>Menyediakan Makanan yang Lezat dan Sehat Untuk Masyarakat</p>
      <p>Contact : (0274)485013</p>
      <a class="btn btn-primary" href="cobalagi.php"><i class="fas fa-paper-plane"></i> Transaksi</a>
    </div>
    </div>

    </div>
    <!-- Jumbotron -->
  </div>
<!--   /content -->
  </div>
</div>
</div>


  <!-- SCRIPTS -->
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


<?php





 ?>