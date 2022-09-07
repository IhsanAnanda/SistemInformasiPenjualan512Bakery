<?php
require('connection.php');
$id = $_GET['id'];
$update = mysqli_query($conn, "SELECT * FROM transaksi WHERE id=$id");
$data = mysqli_fetch_assoc($update);
$temp = $data['plat'];
$dataMobilIni = mysqli_query($conn, "SELECT * FROM mobil WHERE plat='$temp'");
$dataM = mysqli_fetch_assoc($dataMobilIni);
$dataMobil = mysqli_query($conn, "SELECT * FROM mobil WHERE status='Available' OR plat='$temp'");

if(isset($_POST['submit'])){
	$nik = $_POST['nik'];
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['telp'];
	$plat = $_POST['plat'];
	$ambil = $_POST['ambil'];
	$kembali = $_POST['kembali'];
	$lama = $_POST['lama'];
	$dp = $_POST['dp'];
	$query = mysqli_query($conn, "SELECT harga FROM mobil WHERE plat='$plat'");
	$satuan = mysqli_fetch_assoc($query);
	$tarif = $satuan['harga'];
	$total = $tarif*$lama;
	$kurang = $total-$dp;
	mysqli_query($conn, "UPDATE transaksi
		SET nik='$nik', nama='$nama', alamat='$alamat', telp='$telp', plat='$plat', ambil='$ambil',
			kembali='$kembali', lama=$lama, dp=$dp, kurang=$kurang, total=$total
		WHERE id=$id");

	header('Location: cobaview.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Santrans</title>
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
			width: 60%;
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
        <img src="car.png" class="img-fluid" alt=""><img src="car.png" class="img-fluid" alt="">
        <h2 class="white-text"><b>SANTRANS</b></h2>
      </a>

      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-home mr-3"></i>Home</a>
        <a href="cobalagi.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-money-bill-alt mr-3"></i>Input Transaksi</a>
        <a href="cobaview.php" class="list-group-item active waves-effect">
          <i class="fas fa-table mr-3"></i>Data Transaksi</a>
        <a href="cobalagi1.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-car-side mr-3"></i>Input Data Mobil</a>
        <a href="cobaview1.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-list-alt mr-3"></i>Data Mobil</a>

      </div>
    </div>
    </div>
    <!-- Sidebar -->
  </div>
  <!-- content -->
  <div class="col-md-9">
  	<form action="" method="POST">
	<table>
		<tr>
			<th colspan="3"><h4><b>Update Data Transaksi</b></h4></th>
		</tr>
		<tr>
			<td>ID</td>
			<td>:</td>
			<td><input type="text" name="id" value="<?php echo $data['id'];?>" readonly></td>
		</tr>
		<tr>
			<td>NIK</td>
			<td>:</td>
			<td><input type="text" name="nik" value="<?php echo $data['nik'];?>"></td>
		</tr>
		<tr>
			<td>Nama Customer</td>
			<td>:</td>
			<td><input type="text" name="nama" value="<?php echo $data['nama'];?>"></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><textarea name="alamat"><?php echo $data['alamat'];?></textarea></td>
		</tr>
		<tr>
			<td>Nomor Telephone</td>
			<td>:</td>
			<td><input type="text" name="telp" value="<?php echo $data['telp'];?>"></td>
		</tr>
		<tr>
			<td>*Mobil</td>
			<td>:</td>
			<td><select name="plat" id="">
			<?php
				foreach ($dataMobil as $key => $value) {
			 ?>
			<option value="<?php echo $value['plat'];?>"><?php echo $value['tipe']; ?>
			</option>
			<?php
				}
			?>
			</select>
			</td>
		</tr>
		<tr>
			<td>Tanggal Sewa</td>
			<td>:</td>
			<td><input type="date" name="ambil" value="<?php echo $data['ambil'];?>"></td>
		</tr>
		<tr>
			<td>Tanggal Kembali</td>
			<td>:</td>
			<td><input type="date" name="kembali" value="<?php echo $data['kembali'];?>"></td>
		</tr>
		<tr>
			<td>Lama Sewa(hari)</td>
			<td>:</td>
			<td><input type="text" name="lama" value="<?php echo $data['lama'];?>"></td>
		</tr>
		<tr>
			<td>Uang Muka</td>
			<td>:</td>
			<td><input type="text" name="dp" value="<?php echo $data['dp'];?>"></td>
		</tr>
		<tr>
			<td colspan="3"><p class="deep-orange-text">*Cek Kembali Apakah Data Mobil Yang Anda Pilih Sudah Benar</p></td>
		</tr>
		<tr>
			<td colspan="3">
			<center>
			<input type="submit" name="submit" value="Simpan" class="btn btn-primary btn-sm">
			</td>
			</center>
		</tr>
	</table>
	</form>
  </div>
  <!-- /content -->
</div>
</div>
</body>
</html>
