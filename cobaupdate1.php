<?php
require('connection.php');
$id_menu = $_GET['id_menu'];
$update = mysqli_query($conn,"SELECT * FROM tb_menu INNER JOIN tb_kategori ON tb_menu.id_kategori=tb_kategori.id_kategori WHERE kode_menu='$id_menu'");
$data = mysqli_fetch_assoc($update);

if(isset($_POST['submit'])){
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$status = $_POST['status'];

	$result = mysqli_query($conn, "UPDATE tb_menu
		SET nama_menu='$nama', harga='$harga', status='$status' WHERE kode_menu='$id_menu'");

	header('Location: cobaview1.php');
}

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header('Location: login.php');
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
			padding: 10px 10px;
		}
		td{
			padding: 5px 30px;
			white-space: nowrap;
		}
		th{
			padding: 10px 40px;
			white-space: nowrap;
		}
		option{

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
  	<form action="" method="POST">
	<table>
		<tr>
			<th colspan="3"><h4><b>Update Data Menu</b></h4></th>
		</tr>
		<tr>
			<td>Id Menu</td>
			<td>:</td>
			<td><input type="text" name="id_menu" value="<?php echo $data['kode_menu']; ?>" readonly>
			</td>
		</tr>
		<tr>
			<td>Nama Menu</td>
			<td>:</td>
			<td><input type="text" name="nama" value="<?php echo $data['nama_menu']; ?>"></td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td>:</td>
			<td>
			<input type="text" name="" value="<?php echo $data['nama_kategori']; ?>" readonly>
			</td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>:</td>
			<td><input type="text" name="harga" value="<?php echo $data['harga']; ?>"></td>
		</tr>
		<tr>
			<td>Status</td>
			<td>:</td>
			<td>
				<select name="status">
				<option value="Tersedia" <?php if($data['status'] == 'Tersedia'){echo 'selected';}?>>Tersedia</option>
				<option value="Tidak Tersedia" <?php if($data['status'] == 'Tidak Tersedia'){echo 'selected';}?>>Tidak Tersedia</option>
				</select>
			</td>
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
