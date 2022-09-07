<?php
require('connection.php');
$result = mysqli_query($conn, "SELECT * FROM tb_menu INNER JOIN tb_kategori ON tb_menu.id_kategori=tb_kategori.id_kategori ORDER BY nama_menu");

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header('Location: login.php');
}

$username = $_SESSION['username'];
$admin = "Admin";
$role = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE username='$username' AND role='$admin'");
$cek = mysqli_num_rows($role);

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
		}
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
    		padding-left: 46px;
    	}
    	.alnright { text-align: right; }
    	.table-hover tbody tr:hover td {
  			background-color: #5BBEFC;
		}
		.table-padding{
			padding-left: 1000px;
		}
		.table.table-sm{
		padding-left: 100px;
		}
	</style>
</head>
<body class="bg">

<div class="container-fluid">

	<div class="row">
	<div class="col-md-2">
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
        <a href="cobaview1.php" class="list-group-item active waves-effect">
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


	<!-- content -->
	<div class="col-md-10">
	<table class="table-hover">
	<tr>
		<th colspan="6"><h3><b>Daftar Menu 512 Bakery</b></h3></th>
		<th>
		<?php 
		if ($cek>0) {
		?>
		<a class="fas fa-plus-circle fa-2x aqua-gradient-text mr-2" href="<?php echo "cobalagi1.php";?>"></a>
		<?php
		}
		 ?>
		</th>
	</tr>
	<tr>
		<th><h5><b>No.</b></h5></th>
		<th><h5><b>Id Menu</b></h5></th>
		<th><h5><b>Nama Menu</b></h5></th>
		<th><h5><b>Kategori</b></h5></th>
		<th><h5><b>Harga</b></h5></th>
		<th><h5><b>Status</b></h5></th>
		<th><h5><b>Opsi</b></h5></th>
	</tr>
	<?php
	$nomor = 1;
	foreach ($result as $key => $data) {
	$dataMenu = mysqli_query($conn, "SELECT * FROM tb_detail_transaksi WHERE kode_menu='".$data['kode_menu']."' ");
  // $dataMenu1 = mysqli_fetch_array($dataMenu);
  $angka = mysqli_num_rows($dataMenu);
  //ignore error
  // error_reporting(E_ERROR | E_PARSE);
	?>
	<tr>
		<td><?php echo $nomor;?></td>
		<td><?php echo $data['kode_menu'];?></td>
		<td><?php echo $data['nama_menu'];?></td>
		<td><?php echo $data['nama_kategori'];?></td>
		<td>Rp. <?php echo number_format($data['harga']);?></td>
		<td><?php echo $data['status']; ?></td>
		<td>
		<?php
		if ($cek > 0) {
		?>
		<a class="far fa-edit fa-lg green-text mr-2" href="<?php echo "cobaupdate1.php?id_menu=".$data['kode_menu'];?>"></a>
		<?php if ($angka == 0){ ?>
			<a class="far fa-trash-alt fa-lg red-text mr-2" href="<?php echo "cobahapus1.php?id_menu=".$data['kode_menu']?>"></a>
		<?php } ?>
		
		<?php
		}else{
		?>
		-
		<?php
		}
		?>
		</td>
	</tr>
	<?php
	$nomor++;
	}
	?>

	</table>
	</div>
	<!-- /content -->
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

