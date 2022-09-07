<?php
require('connection.php');
$result = mysqli_query($conn, "SELECT * FROM menu");
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
        <a href="cobalagi1.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-pizza-slice mr-3"></i>Input Daftar Menu</a>
        <a href="cobaview1.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-list-alt mr-3"></i>Daftar Menu</a>
        <a href="cobalaporan.php" class="list-group-item active waves-effect">
          <i class="fas fa-file-pdf mr-3"></i>Laporan Bulanan</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-search-dollar mr-3"></i>Pencarian Nota</a>

      </div>
    </div>
    </div>
    <!-- Sidebar -->
  </div>


	<!-- content -->
	<div class="col-md-10">

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

