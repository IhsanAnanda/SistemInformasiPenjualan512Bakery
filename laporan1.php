<?php
require('connection.php');

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header('Location: login.php');
}

$username = $_SESSION['username'];
$dari = $_SESSION['dari'];
$hingga = $_SESSION['hingga'];

$data = mysqli_query($conn, "SELECT * FROM tb_transaksi WHERE tanggal BETWEEN '$dari' AND '$hingga' ORDER BY no_trans"); 

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
	table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
	}
	td {
  padding-left: 5px;
	}
	th {
	padding-left: 3px;
	}
	</style>
</head>

<body class="bg">
<center>
<!--   content -->
	<form action="" method="POST">
	<table class="fixed">
		<col width="80px"/>
    <col width="100px" />
    <col width="100px" />
    <col width="100px" />
    <col width="100px" />
    <col width="100px" />
    <col width="100px" />
    <col width="100px" />
    <tr>
    	<th colspan="8" style="text-align:center;"><h3><b>Laporan Transaksi 512 Bakery</b></h3></th>
    </tr>
		<tr>
			<th colspan="5">
				<h5><b>Dicetak Oleh : </b></h5>
			</th>
			<th colspan="3" style="text-align:right;">
				<h5><b><?php echo $username; ?></b></h5>
			</th>
		</tr>
		<tr>
			<th colspan="5">
				<h5><b>Dari Tanggal : </b></h5>
			</th>
			<th colspan="3" style="text-align:right;">
				<h5><b><?php echo $dari; ?></b></h5>
			</th>
		</tr>
		<tr>
			<th colspan="5">
				<h5><b>Hingga Tanggal : </b></h5>
			</th>
			<th colspan="3" style="text-align:right;">
				<h5><b><?php echo $hingga; ?></b></h5>
			</th>
		</tr>
		<tr>
			<th>No. Nota</th>
			<th>Tanggal</th>
			<th>Nama</th>
			<th>Kasir</th>
			<th>Total</th>
			<th>Bayar</th>
			<th>Kembali</th>
			<th>Keterangan</th>
		</tr>

		<?php
		$totalTrans = 1;
		$totalJual = 0;
		$nomor = 1;
		foreach ($data as $key => $value) {
		?>
		<tr>
			<td><?php echo $value['no_trans'];?></td>
			<td><?php echo $value['tanggal'];?></td>
			<td><?php echo $value['pelanggan'];?></td>
			<td><?php echo $value['username'];?></td>
			<td>Rp. <?php echo number_format($value['total']); ?></td>
			<td>Rp. <?php echo number_format($value['bayar']); ?></td>
			<td>Rp. <?php echo number_format($value['kembali']); ?></td>
			<td><?php echo $value['ket']; ?></td>
		</tr>
		<?php
		$totalTrans++;
		$totalJual = $totalJual + $value['total'];
		$nomor++;
		}
		?>
		<tr>
			<th colspan="4" style="text-align:right;">Total Penjualan</th>
			<th>Rp. <?php echo number_format($totalJual); ?></th>
		</tr>
		<tr>
			<th colspan="4" style="text-align:right;">Total Transaksi</th>
			<th><?php echo $totalTrans; ?></th>
		</tr>
	</table>


	</form>
  </div> <!-- content -->

</div>
</div>
</center>

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
	$_SESSION['dari'] = null;
	$_SESSION['hingga'] = null;
if(isset($_POST['submit'])){

}

 ?>
