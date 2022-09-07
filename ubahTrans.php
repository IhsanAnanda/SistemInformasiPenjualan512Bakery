<?php
require('connection.php');

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header('Location: login.php');
}

$username = $_SESSION['username'];
if (is_null($_SESSION['old_no_trans'])) {
	$old_no_trans = $_GET['no_trans'];
}else{
	$old_no_trans = $_SESSION['old_no_trans'];
}

$menu = mysqli_query($conn, "SELECT * FROM tb_menu INNER JOIN tb_kategori ON tb_menu.id_kategori=tb_kategori.id_kategori WHERE status='tersedia' ORDER BY tb_menu.nama_menu");

if ($_SESSION['dummyCheck'] == 0) {
	$old_data = mysqli_query($conn, "SELECT * FROM tb_transaksi INNER JOIN tb_detail_transaksi ON tb_transaksi.no_trans=tb_detail_transaksi.no_trans INNER JOIN tb_menu ON tb_detail_transaksi.kode_menu=tb_menu.kode_menu WHERE tb_detail_transaksi.no_trans='$old_no_trans' ORDER BY tb_detail_transaksi.kode_menu");
	$old_data1 = mysqli_fetch_array($old_data);

	$delete = mysqli_query($conn, "DELETE FROM tb_dummy");

	foreach ($old_data as $key => $value) {
		$kode_menu = $value['kode_menu'];
		$nama_menu = $value['nama_menu'];
		$harga = $value['harga'];
		$banyak = $value['banyak'];
		$jumlah = $value['jumlah'];
		$result = mysqli_query($conn, "INSERT INTO tb_dummy
    (kode_menu, nama_menu, harga, banyak, jumlah) VALUES
    ('$kode_menu', '$nama_menu', '$harga', '$banyak', '$jumlah')");
	}
	$_SESSION['dummyCheck'] = 1;
}

$dummy = mysqli_query($conn, "SELECT * FROM tb_dummy");

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
    <col width="112px" />
    <col width="224px" />
    <col width="130px" />
    <col width="109px" />
    <col width="144px" />
    <col width="135px" />
		<tr>
			<th colspan="7"><h4><b>Ubah Data Transaksi</b></h4></th>
		</tr>
		<tr>
			<th colspan="2"><h5><b>Kode Transaksi :</b></h5></th>
			<th colspan="5"><h5><b><?php echo $old_no_trans;?></b></h5></th>
		</tr>
		<tr>
			<th colspan="4">
				<select class="form-control" name="kode_menu">
				<?php
				foreach ($menu as $key => $data) {
				?>
				<option value="<?php echo $data['kode_menu'] ?>"><?php echo $data['nama_menu']; ?></option>
				<?php
				}
				?>
				</select>
			</th>
			<th>
				<input type="number" name="banyak" min="1" value="1">
			</th>
			<th>
				<input type="submit" name="add" value="Tambah" class="btn btn-primary btn-sm"
				onclick="">
			</th>
			<th>
			</th>
		</tr>
		<tr>
			<th>Nomor</th>
			<th>Kode Menu</th>
			<th>Nama Menu</th>
			<th>Harga</th>
			<th>Banyaknya</th>
			<th>Jumlah</th>
			<th>Opsi</th>
		</tr>

		<?php
		$nomor = 1;
		$total = 0;
		foreach ($dummy as $key => $value) {
		?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $value['kode_menu'];?></td>
			<td><?php echo $value['nama_menu'];?></td>
			<td>Rp. <?php echo number_format($value['harga']);?></td>
			<td><?php echo $value['banyak'];?></td>
			<td>Rp. <?php echo number_format($value['jumlah']); ?></td>
			<td>
			<a class="far fa-trash-alt fa-lg red-text mr-2" href="
			<?php
			$_SESSION['old_no_trans'] = $old_no_trans;
			 echo "cobahapus4.php?kode_menu=".$value['kode_menu'];
			?>">
			</a>
			</td>
		</tr>
		<?php
		$nomor++;
		$total = $total + $value['jumlah'];
		}
		?>
		<tr>
			<th colspan="5" style="text-align:right">Total</th>
			<th colspan="2"><?php echo $total ?></th>
		</tr>
		<tr>
			<th colspan="5" style="text-align:right">Bayar</th>
			<th colspan="2"><input type="number" name="bayar" min="<?php echo $total ?>" value="<?php echo $total ?>" style="width: 6em"></th>
		</tr>
		<tr>
			<th colspan="5" style="text-align:right">Nama</th>
			<th><input type="text" name="pelanggan" value="" style="width: 6em"></th>
			<th><input type="submit" name="submit" value="Selesai" class="btn btn-primary btn-sm"
				onclick="PopUp()"></th>
		</tr>
	</table>


	</form>
  </div> <!-- content -->

</div>
</div>

<script type="text/javascript">
	function PopUp(){
		alert("Data Transaksi Berhasil Dimasukkan");
	}
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

function DummyTable($conn){
	$clearDummy = mysqli_query($conn, "DELETE FROM tb_dummy");
}

if(isset($_POST['submit'])){
	$pelanggan = $_POST['pelanggan'];
	$bayar = $_POST['bayar'];
	$kembali = $bayar - $total;
	$ket = $old_no_trans."P";
	$result = mysqli_query($conn, "INSERT INTO tb_transaksi
    (tanggal, pelanggan, total, bayar, kembali, username, ket) VALUES
    (now(), '$pelanggan', '$total', '$bayar', $kembali, '$username', '$ket')");

	$no_trans = mysqli_query($conn, "SELECT * FROM tb_transaksi ORDER BY no_trans DESC LIMIT 1");
	$no_trans1 = mysqli_fetch_array($no_trans);
	$no_trans2 = $no_trans1['no_trans'];
	foreach ($dummy as $key => $value) {
		$kode_menu = $value['kode_menu'];
		$harga = $value['harga'];
		$banyak = $value['banyak'];
		$jumlah = $value['jumlah'];
		$result1 = mysqli_query($conn, "INSERT INTO tb_detail_transaksi
    (kode_menu, banyak, jumlah, no_trans) VALUES
    ('$kode_menu', '$banyak', '$jumlah', '$no_trans2')");
	}
	$_SESSION['no_trans'] = $no_trans2;
	$result2 = mysqli_query($conn, "UPDATE tb_transaksi 
		SET tanggal=null WHERE no_trans='$old_no_trans'");
	echo "<script type='text/javascript'>
    	window.open('http://localhost/PWPraktikum/KP_512Bakery/receipt.php','_blank');</script>";
}

elseif (isset($_POST['add'])) {
	$_SESSION['old_no_trans'] = $old_no_trans;
	$kode_menu = $_POST['kode_menu'];
	$banyak = $_POST['banyak'];
	$data =  mysqli_query($conn, "SELECT * FROM tb_menu WHERE kode_menu='$kode_menu'");
	$satuan = mysqli_fetch_assoc($data);
	$harga = $satuan['harga'];
	$jumlah = $banyak*$satuan['harga'];
	$nama_menu = $satuan['nama_menu'];
	$cek_menu = mysqli_query($conn, "SELECT * FROM tb_dummy WHERE kode_menu='$kode_menu'");
	$cek = mysqli_num_rows($cek_menu);
	$datalama = mysqli_fetch_assoc($cek_menu);
	if ($cek>0) {
		$banyak_baru = $banyak + $datalama['banyak'];
		$jumlah_baru = $banyak_baru*$satuan['harga'];
		$result = mysqli_query($conn, "UPDATE tb_dummy
		SET jumlah='$jumlah_baru', banyak='$banyak_baru' WHERE kode_menu='$kode_menu'");
		echo "<script type='text/javascript'>
    	window.open('http://localhost/PWPraktikum/KP_512Bakery/ubahTrans.php','_self');</script>";
	}
	else{
		$result = mysqli_query($conn, "INSERT INTO tb_dummy
    	(kode_menu, nama_menu, harga, banyak, jumlah) VALUES
    	('$kode_menu','$nama_menu', '$harga', '$banyak', '$jumlah')");
		echo "<script type='text/javascript'>
    	window.open('http://localhost/PWPraktikum/KP_512Bakery/ubahTrans.php','_self');</script>";
	}
	
}
 ?>
