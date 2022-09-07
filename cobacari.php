<?php
require('connection.php');

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header('Location: login.php');
  exit();
}

$username = $_SESSION['username'];

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
      padding: 10px 30px;
    }
    td{
      padding: 5px 30px;
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
        <a href="cobaview.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-table mr-3"></i>Data Transaksi</a>
        <a href="cobaview1.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-list-alt mr-3"></i>Daftar Menu</a>
        <a href="cobaview2.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-bread-slice mr-3"></i>Kategori</a>
        <a href="cobalaporan.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-file-pdf mr-3"></i>Laporan Bulanan</a>
        <a href="cobacari.php" class="list-group-item active waves-effect">
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
  <div class="col-md-10">
    <center>
    <!-- Disini lihat DC ny nathan buat method GET ny, passing data ke halaman cobaviewcari -->
    <form action="" method="POST">
  <table>
    <tr>
      <th colspan="3"><h4><b>Pencarian Nota</b></h4></th>
    </tr>
    <tr>
      <td>Nomor Nota</td>
      <td>:</td>
      <td><input type="text" name="no_trans"></td>
    </tr>
    <tr>
      <td colspan="3">
      <center>
      <input type="submit" name="submit" value="Cari" class="btn btn-primary btn-sm"
      onclick="">
      </center>
      </td>
    </tr>
  </table>
  </form>
  </center>
  </div>
</div>
</div>

<script type="text/javascript">
  // function PopUp(){
  //  alert("Data Menu Baru Berhasil Dimasukkan!");
  // }
</script>

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
if(isset($_POST['submit'])){
  $no_trans = $_POST['no_trans'];
  $search = mysqli_query($conn, "SELECT * FROM tb_transaksi WHERE no_trans='$no_trans'");
  $cek = mysqli_num_rows($search);
  if ($cek>0) {
    // $url = "cobaview4.php?no_trans=".$no_trans;
    // header('Location: $url');
    // header("Location:cobaview4.php?no_trans=".$no_trans);
    $_SESSION['no_trans'] = $no_trans;
    echo "<script type='text/javascript'>
      window.open('http://localhost/PWPraktikum/KP_512Bakery/cobaview4.php','_self');</script>";
  }else{
    echo "<script type='text/javascript'>alert('Nomor Nota Tidak Ditemukan!');</script>";
  }
}

?>
