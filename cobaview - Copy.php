<?php 
 
 ?><?php

require('connection.php');
$result = mysqli_query($conn, "SELECT * FROM transaksi am JOIN customer m ON am.nik = m.nik 
						JOIN car mk ON mk.plat = am.plat");
// JOIN digunakan untuk menghubungkan 2 tabel
// m = mahasiswa; am = ambil_mk; mata_kuliah = mk
// ON digunakan sebagai kunci penguhung antar 2 tabel(foreign key)
// m.nim digunakan untuk mengambil nim dari tabel mahasiswa

?> 


<!DOCTYPE html>
<html>
<head>
	<title>Coba aja</title>
	<style type="text/css">
		body{
			font-family: sans-serif;
		}
		th{
			background-color: #67a5e6;
			color: white;
		}
		table{
			border:  #67a5e6 3px solid; 
			border-color:  #67a5e6;
			border-radius: 5px;
			width: 70%;
			margin: 20px;
		}
		a{
			text-decoration: none; 
		}
	</style>
</head>
<body>
<center>
<table>
	<tr>
		<th colspan="10">Daftar Transaksi</th>
	</tr>
	<tr>
		<th width="5%">ID</th>
		<th width="10%">NIK</th>
		<th width="10%">Nama</th>
		<th width="10%">Plat</th>
		<th width="10%">Tipe</th>
		<th width="15%">Tanggal Sewa</th>
		<th width="15%">Tanggal Kembali</th>
		<th width="5%">Lama Sewa</th>
		<th width="10%">Total</th>
	</tr>
	<?php foreach ($result as $key => $data) {
	?>
	<tr>
		<td><?php echo $data['id'];?></td>
		<td><?php echo $data['nik'];?></td>
		<td><?php echo $data['nama'];?></td>
		<td><?php echo $data['plat'];?></td>
		<td><?php echo $data['tipe'];?></td>
		<td><?php echo $data['ambil'];?></td>
		<td><?php echo $data['kembali'];?></td>
		<td><?php echo $data['lama'];?></td>
		<td><?php echo $data['total'];?></td>
<!-- 		<td><a href="<?php echo "update_data.php?nim=".$data['nim']."&kode_mk=".$data['kode_mk'];?>">Ubah</a>
			<a href="<?php echo "delete_data.php?nim=".$data['nim']."&kode_mk=".$data['kode_mk'];?>">Hapus</a>
		</td> -->
	</tr>
	<?php
	}
	?>
	
</table>
<a href="cobalagi.php">+ Tambah Data +</a>
</center>
<p></p>

</body>
</html>
