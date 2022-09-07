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
$tanggal = $trans1['tanggal'];
$kasir = $trans1['username'];
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
	
	</style>
</head>

<body class="bg">
<center>
<!--   content -->
	<form action="" method="POST">
	<table class="fixed">
		<col width="85px"/>
    <col width="112px" />
    <col width="224px" />
    <col width="100px" />
    <col width="90px" />
    <col width="90px" />
    <tr>
    	<th colspan="6" style="text-align:center;"><h3><b>512 Bakery</b></h3></th>
    </tr>
		<tr>
			<th colspan="2">
				<h5><b>Kode Transaksi : </b></h5>
			</th>
			<th colspan="4" style="text-align:right;">
				<h5><b><?php echo $no_trans; ?></b></h5>
			</th>
		</tr>
		<tr>
			<th colspan="2">
				<h5><b>Tanggal : </b></h5>
			</th>
			<th colspan="4" style="text-align:right;">
				<h5><b><?php echo $tanggal; ?></b></h5>
			</th>
		</tr>
		<tr>
			<th colspan="2">
				<h5><b>Kasir : </b></h5>
			</th>
			<th colspan="4" style="text-align:right;">
				<h5><b><?php echo $kasir; ?></b></h5>
			</th>
		</tr>
		<tr>
			<th colspan="2">
				<h5><b>Nama Pelanggan : </b></h5>
			</th>
			<th colspan="4" style="text-align:right;">
				<h5><b><?php echo $pelanggan; ?></b></h5>
			</th>
		</tr>
		<tr>
			<th colspan="6"><b>==========================================================================================</b>
			</th>
		</tr>
		<tr>
			<th>Nomor</th>
			<th>Kode Menu</th>
			<th>Nama Menu</th>
			<th>Harga</th>
			<th>Banyak</th>
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
			<td>Rp. <?php echo number_format($value['jumlah']/$value['banyak']);?></td>
			<td><?php echo $value['banyak'];?></td>
			<td>Rp. <?php echo number_format($value['jumlah']); ?></td>
		</tr>
		<?php
		$nomor++;
		}
		?>
		<tr>
			<th colspan="6"><b>==========================================================================================</b>
			</th>
		</tr>
		<tr>
			<th colspan="5" style="text-align:right">Total</th>
			<th colspan="2">Rp. <?php echo number_format($total); ?></th>
		</tr>
		<tr>
			<th colspan="5" style="text-align:right">Bayar</th>
			<th colspan="2">Rp. <?php echo number_format($bayar); ?></th>
		</tr>
		<tr>
			<th colspan="5" style="text-align:right">Kembali</th>
			<th colspan="2">Rp. <?php echo number_format($bayar-$total); ?></th>
		</tr>
		<tr>
			<th colspan="6" style="text-align:center;"><br><br><b>Terima Kasih Telah Berbelanja Di Toko Kami</b>
			</th>
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
$_SESSION['no_trans'] = null;

if(isset($_POST['submit'])){

}

 ?>
