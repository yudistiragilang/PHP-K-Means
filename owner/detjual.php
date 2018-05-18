
<?php
session_start();
if(empty($_SESSION)){
  header("Location: ../index.php");
}


  include'../config.php';

	$DATA = "SELECT COUNT(IdJual) FROM penjualan";
	$jumlah = mysqli_query($mysqli, $DATA);
	$row = mysqli_fetch_row($jumlah);

	// disini memiliki total jumlah baris
	$rows = $row[0];

	// variabel yang digunakan untuk membatasi data yang ditampilkan
	$page_rows = 10;

	// membantu halaman membuat halaman terakhir ceil adalah membulatkan data koma
	$halaman=ceil($rows / $page_rows);
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$start = ($page - 1) * $page_rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Rekap Transaksi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../js/jquery-ui/jquery-ui.css">
  <link rel="shortcut icon" href="../favicon.ico" />
  <script src="../js/jquery.js"></script>
  <script src="../js/jquery-ui/jquery-ui.js"></script>
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
        <li><a href="index.php">Beranda</a></li>
        <li><a href="member.php">Member</a></li>
        <li><a href="produk.php">Produk</a></li>
        <li><a href="sto.php">Laporan STO</a></li>
        <li class="active"><a href="penjualan.php">Laporan Penjualan</a></li>
        <li><a href="../k-means/">Cluster Penjualan</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="profil.php">Profil</a></li>
    	<li><a href="logout.php"><span class=""></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  

 <div class="container">
 
  	<div class="jumbotron">
  		<img src="../gambar/logo.png" class="img-rounded" alt="Lights" style="width:100%"> 
 	</div>
	
	<div class="row">
		<div class="col-md-12">
			<h4>Detail Penjualan</h4>
		</div>
	</div>

	<div class="row">
		<div class="col-md-2 col-md-offset-11">
			<?php
				$kode=$_GET['kode'];
				$Data="SELECT * FROM detjual INNER JOIN produk ON produk.IdPrd=detjual.IdPrd WHERE IdJual='$kode'";
				$result= $mysqli->query($Data);
				while($k=$result->fetch_array()){
					$kod=$k['IdJual'];
				}
			echo'
			<a href="../laporan/lapjual.php?kode='.$kod.'" class="btn btn-default"><span class="glyphicon glyphicon-envelope"></span>Cetak</a>';?>
		</div>
		
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-bordered">
				<thead>
				<th class="col-sm-1">No</th>
				<th hidden="hidden">Id Penjualan</th>
				<th class="col-sm-3">Nama Produk</th>
				<th class="col-sm-1">Jumlah</th>
				<th class="col-sm-1">Harga</th>
				<th class="col-sm-1">Total</th>
				</thead>
				<caption>Data Penjualan</caption>
				<?php

				$id=$_GET['kode'];
				$Data="SELECT * FROM detjual INNER JOIN produk ON produk.IdPrd=detjual.IdPrd WHERE IdJual='$id'";
				$result= $mysqli->query($Data);
				$no=1;
				if ($result->num_rows > 0) {
					while($b=$result->fetch_array()){
						$total=$b['Harga']*$b['Jumlah'];
					echo'
						<tbody align="center">
							<tr>
								<td>'.$no++.'</td>
								<td hidden>'.$b['IdDetJual'].'</td>
								<td>'.$b['NamaPrd'].'</td>
								<td>'.$b['Jumlah'].'</td>
								<td>'.$b['Harga'].'</td>
								<td>'.$total.'</td>								
							</tr>
						</tbody>';
					}
				}
				?>
				</table>

				<!-- paging -->
				
				<!-- paging -->
			</div>
		</div>
	</div>
	
	
<!-- footer -->
<div class="page-header">
	<h4 align="center">.:Yudhistira Gilang Adisetyo:.</h4>
	<h4 align="center">yudhistiragilang22@gmail.com</h4>
	<h4 align="center">Copyright 2017</h4>
</div>
<!-- footer -->

	
</div>
</body>
</html>