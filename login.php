<?php
  require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>512 Bakery</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <style>
    body, html {
      height: 100%;
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
    }
    .center{
      margin-top: 40px;

    }
    .col-md-9{
      margin-top: 0px;
    }
    th{
      background-color: #1c2331  ;
      color: white;
      padding: 10px;

    }
    table{
      border:  #1c2331   2px solid;
      border-color:  #1c2331  ;
      background-color: #1c2a48;
      color: white;
      border-radius: 5px;
      width: 100%;
      margin: 0px;
      padding: 20px 20px;
    }
    td{
      padding: 5px 10px;
    }
  </style>
</head>


<body>

<div class="bg">
<div class="container-fluid">

	<div class="row">

<!--   content -->
<div class="col-md-12">

  <div class="col-md-4 mx-auto">

    <!-- Jumbotron -->
    <div class="card card-image center " style="background-image: url(jumbo.jpg)">

    <!-- Content -->

    <div class="text-white text-center d-flex align-items-center rgba-black-strong py-4 px-4">
    <div class="mx-auto">
      <a class="logo-wrapper waves-effect">
        <center><img src="logo.png" class="img-fluid" alt="" style="max-height: 100px;"></center>
        <h3 class="white-text"><b>Sistem Informasi <br> Transaksi Penjualan <br>512 Bakery</b></h3>
      </a>
      <form action="" method="POST">
      <table class="mx-auto" style="" >
        <tr>
          <th colspan="8"><h4><b>Login</b></h4></th>
        </tr>
        <tr>
          <td>Username:</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td colspan="8"><input type="text" name="username"></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td colspan="8"><input type="password" name="password"></td>
        </tr>
        <tr>
          <td colspan="8"><input type="submit" name="submit" value="Masuk" class="btn btn-primary btn-sm"
      onclick=""></td>
        </tr>
      </table>
      </form>
    </div>
    </div>

    </div>
    <!-- Jumbotron -->

  </div>

</div>
<!--   /content -->
  </div>
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


<?php
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $login = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE username='$username' AND password='$password'");
  $cek = mysqli_num_rows($login);

if($cek > 0){
  session_start();
  $_SESSION['username'] = $username;
  $_SESSION['status'] = "login";
  header('Location: index.php');
}else{
  echo "<script type='text/javascript'>alert('Password dan Username Salah!');</script>";
  // header('Location: login.php');
}

}

 ?>