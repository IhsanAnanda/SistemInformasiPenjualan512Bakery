<?php
require('connection.php');

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header('Location: login.php');
}

$username = $_SESSION['username'];
$no_trans = $_SESSION['no_trans'];
// $no_trans = $_GET['no_trans'];

if (is_null($no_trans)) {
	$no_trans = $_GET['no_trans'];
}

$data = mysqli_query($conn, "SELECT * FROM tb_detail_transaksi INNER JOIN tb_menu ON tb_detail_transaksi.kode_menu=tb_menu.kode_menu WHERE no_trans = '$no_trans'");
$trans = mysqli_query($conn, "SELECT * FROM tb_transaksi WHERE no_trans = '$no_trans'");
$trans1 = mysqli_fetch_array($trans);
$pelanggan = $trans1['pelanggan'];
$total = $trans1['total'];
$bayar = $trans1['bayar'];

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
	<table class="fixed">
		<col width="85px"/>
    <col width="112px" />
    <col width="224px" />
    <col width="100px" />
    <col width="109px" />
    <col width="144px" />
		<tr>
			<th colspan="6"><h4><b>Data Detail Transaksi</b></h4></th>
		</tr>
		<tr>
			<th colspan="2">
				<h5><b>Kode Transaksi : </b></h5>
			</th>
			<th colspan="4" align="left">
				<h5><b><?php echo $no_trans; ?></b></h5>
			</th>
		</tr>
		<tr>
			<th colspan="2">
				<h5><b>Nama Pelanggan : </b></h5>
			</th>
			<th colspan="4" align="left">
				<h5><b><?php echo $pelanggan; ?></b></h5>
			</th>
		</tr>
		<tr>
			<th>Nomor</th>
			<th>Kode Menu</th>
			<th>Nama Menu</th>
			<th>Harga</th>
			<th>Banyaknya</th>
			<th>Jumlah</th>
		</tr>

		<?php
		$nomor = 1;
		foreach ($data as $key => $value) {
		?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $value['kode_menu'];?></td>
			<td><?php echo $value['nama_menu'];?></td>
			<!-- <td>Rp. <?php //echo number_format($value['harga']);?></td> -->
			<td><?php echo number_format($value['jumlah']/$value['banyak']);?></td>
			<td><?php echo $value['banyak'];?></td>
			<td>Rp. <?php echo number_format($value['jumlah']); ?></td>
		</tr>
		<?php
		$nomor++;
		}
		?>
		<tr>
			<th colspan="5" style="text-align:right">Total</th>
			<th colspan="2">Rp. <?php echo number_format($total); ?></th>
		</tr>
		<tr>
			<th colspan="5" style="text-align:right">Bayar</th>
			<th colspan="2">Rp. <?php echo number_format($bayar); ?></th>
		</tr>
	</table>


	</form>
  </div> <!-- content -->

</div>
</div>

<script type="text/javascript">
	window.print();
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
$_SESSION['no_trans'] = null;

if(isset($_POST['submit'])){

}

 ?>
