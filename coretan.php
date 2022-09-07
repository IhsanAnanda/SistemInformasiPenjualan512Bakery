<?php
require('connection.php');

// mengaktifkan session
$old_data = mysqli_query($conn, "SELECT * FROM tb_transaksi INNER JOIN tb_detail_transaksi ON tb_transaksi.no_trans=tb_detail_transaksi.no_trans INNER JOIN tb_menu ON tb_detail_transaksi.kode_menu=tb_menu.kode_menu WHERE tb_detail_transaksi.no_trans=47");
// $old_data1 = mysqli_fetch_array($old_data);

// $delete = mysqli_query($conn, "DELETE FROM tb_dummy");

foreach ($old_data as $key => $value) {
    $kode_menu = $value['kode_menu'];
    $nama_menu = $value['nama_menu'];
    $harga = $value['harga'];
    $banyak = $value['banyak'];
    $jumlah = $value['jumlah'];
    echo $kode_menu;
    echo "<br>";
    echo $nama_menu;
    echo "<br>";
    echo $harga;
    echo "<br>";
    echo $banyak;
    echo "<br>";
    echo $jumlah;
    echo "<br>";
    echo "<br>";
    // $result = mysqli_query($conn, "INSERT INTO tb_dummy
    // (kode_menu, nama_menu, harga, banyak, jumlah) VALUES
    // ('$kode_menu', '$nama_menu', '$harga', '$banyak', '$jumlah')");
  }

// $no_trans = 47;
// $ket = $no_trans."P";
// echo($ket);
?>
