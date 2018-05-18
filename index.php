
<?php
session_start();
if($_SESSION){
  header("Location: logout.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Ecc Solo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="shortcut icon" href="favico.ico" />
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
      <a class="navbar-brand" href="index.php">Ecc - Solo</a>
    </div>
  </div>
</nav>
  

  <div class="container">
  	<div class="jumbotron">
  		<img src="./gambar/logo.png" class="img-rounded" alt="Lights" style="width:100%"> 
 	  </div>
  	<div class="row">
      <div class="col-md-4 col-md-offset-2">
        <div class="thumbnail">
          <a href="daftarmember.php">
            <img src="gambar/daftar.jpg" alt="Lights" style="width:100%">
            <div class="caption">
              <p>Daftar Member</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-4">
          <div class="thumbnail">
          <a href="cariproduk.php">
            <img src="gambar/katalog.jpg" alt="Lights" style="width:100%">
            <div class="caption">
              <p>Cari Produk</p>
            </div>
          </a>
        </div>
      </div>
  	</div>

	<!-- footer -->
	<div class="page-header">
    <a href="login.php"><p align="center">.:Yudhistira Gilang Adisetyo:. yudhistiragilang22@gmail.com Copyright 2017</p></a>
	</div>
	<!-- footer -->
  </div>
</body>
</html>