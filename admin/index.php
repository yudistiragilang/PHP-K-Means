
<?php
session_start();
if(empty($_SESSION)){
  header("Location: ../index.php");
}

  include'../config.php';

  $DATA = "SELECT COUNT(IdMember) FROM member";
  $jumlah = mysqli_query($mysqli, $DATA);
  $row = mysqli_fetch_row($jumlah);

  // disini memiliki total jumlah baris
  $rows = $row[0];

  $data = "SELECT COUNT(IdPrd) FROM produk";
  $jum = mysqli_query($mysqli, $data);
  $ro = mysqli_fetch_row($jum);

  // disini memiliki total jumlah baris
  $roo = $ro[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Halaman Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="shortcut icon" href="../favicon.ico" />
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">ECC-Solo</a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Beranda</a></li>
        <li><a href="akses.php">Hak Akses</a></li>
        <!-- <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Hak Akses <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="aksesa.php">Hak Akses Admin</a></li>
            <li><a href="aksesk.php">Hak Akses Kasir</a></li>
            <li><a href="akseso.php">Hak Akses Owner</a></li>
          </ul>
        </li> -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Data Master <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="member.php">Data Member</a></li>
              <li><a href="produk.php">Data Produk</a></li>
            </ul>
        </li>
        <li><a href="brgmasuk.php">STO</a></li>
        <li><a href="laporansto.php">Laporan</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profil.php">Profil</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  

  <div class="container">
  	<div class="jumbotron">
  		<img src="../gambar/logo.png" class="img-rounded" alt="Lights" style="width:100%">
      
      <div class="row">
        <br>
        <br>
        <p>Selamat datang kembali <?php echo $_SESSION['username']; ?></p>
      </div> 
 	</div>


    <div class="row" align="center">
      
      <div class="col-md-3">
        <div class="thumbnail">
          <a href="member.php">
            <img src="../gambar/member.png" alt="Lights" style="width:100%">
            <div class="caption">
              <p>Tota Member --> <?php echo $rows; ?></p>
            </div>
          </a>
        </div>
      </div>

      <div class="col-md-3">
        <div class="thumbnail">
          <a href="produk.php">
            <img src="../gambar/buku.png" alt="Lights" style="width:100%">
            <div class="caption">
              <p>Total Produk --> <?php echo $roo; ?></p>
            </div>
          </a>
        </div>
      </div>

      <div class="col-md-3">
        <div class="thumbnail">
          <a href="brgmasuk.php">
            <img src="../gambar/sto.png" alt="Lights" style="width:100%">
            <div class="caption">
              <p>STO</p>
            </div>
          </a>
        </div>
      </div>

      <div class="col-md-3">
        <div class="thumbnail">
          <a href="laporansto.php">
            <img src="../gambar/laporan.png" alt="Lights" style="width:100%">
            <div class="caption">
              <p>Laporan STO</p>
            </div>
          </a>
        </div>
      </div>

    </div>
	<!-- footer -->
	<div class="page-header">
    <p align="center">.:Yudhistira Gilang Adisetyo:. yudhistiragilang22@gmail.com Copyright 2017</p>
  </div>
	<!-- footer -->
  </div>
</body>
</html>