
<?php
session_start();
if(empty($_SESSION)){
  header("Location: ../index.php");
}


  include'../config.php';
  

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Data Sangat Laku</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../js/jquery-ui/jquery-ui.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
        <li><a href="penjualan.php">Laporan Penjualan</a></li>
        <!-- <li><a href="../k-means/">Cluster Penjualan</a></li> -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Cluster Penjualan<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../k-means/">Proses K-Means</a></li>
            <li class="active"><a href="sl.php">Hasil Clustering</a></li>
          </ul>
        </li>
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
			<h4>Hasil Clustering</h4>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<div class="table-bordered">
				<table class="table table-hover">
				<thead>
				<th class="col-sm-1">No</th>
				<th class="col-sm-1">Id Produk</th>
				<th class="col-sm-3">Nama</th>
				<th class="col-sm-1">Keterangan</th>
				</thead>
				<caption>Sangat Laku
					<!-- <button name="CetakSL" type="submit" class="btn btn-info">Cetak</button> -->
				</caption>
				<?php

				// $maxiterasi =mysqli_query($mysqli,"SELECT MAX(iterasi) AS maxiterasi FROM centroid_temp") ;

				$max="SELECT MAX(iterasi) AS maksimal FROM centroid_temp";
				$lap= $mysqli->query($max);
				$hasil=$lap->fetch_array();
				// while ( $k=$lap->fetch_array()) {
				//  	echo '
				//  	<tbody align="center">
				// 			<tr>
				// 				<td>'.$k['iterasi'].'</td>
				// 			</tr>
				// 		</tbody>';
				//  } 

				$Data="SELECT * FROM produk INNER JOIN centroid_temp ON produk.IdPrd=centroid_temp.IdPrd WHERE c1='1'AND iterasi='".$hasil['maksimal']."'";
				// $Data="SELECT * FROM produk INNER JOIN centroid_temp ON produk.IdPrd=centroid_temp.IdPrd WHERE c1='1'AND iterasi='".$lap."'";
				$result= $mysqli->query($Data);
				$no =1;
				if ($result->num_rows > 0) {
					while($b=$result->fetch_array()){
					echo'
						<tbody align="center">
							<tr>
								<td>'.$no++.'</td>
								<td>'.$b['IdPrd'].'</td>
								<td>'.$b['NamaPrd'].'</td>
								<td>Sangat Laku</td>
							</tr>
						</tbody>';
					}
				}
				?>
				</table>
			</div>
		</div>
		<div class="col-md-4">
			<div class="table-bordered">
				<table class="table table-hover">
				<thead>
				<th class="col-sm-1">No</th>
				<th class="col-sm-1">Id Produk</th>
				<th class="col-sm-3">Nama</th>
				<th class="col-sm-1">Keterangan</th>
				</thead>
				<caption>Laku</caption>
				<?php

			
				$Data="SELECT * FROM produk INNER JOIN centroid_temp ON produk.IdPrd=centroid_temp.IdPrd WHERE c2='1' AND iterasi='".$hasil['maksimal']."'";
				$result= $mysqli->query($Data);
				$no =1;
				if ($result->num_rows > 0) {
					while($b=$result->fetch_array()){
					echo'
						<tbody align="center">
							<tr>
								<td>'.$no++.'</td>
								<td>'.$b['IdPrd'].'</td>
								<td>'.$b['NamaPrd'].'</td>
								<td>Laku</td>
							</tr>
						</tbody>';
					}
				}
				?>
				</table>
			</div>
		</div>
		<div class="col-md-4">
			<div class="table-bordered">
				<table class="table table-hover">
				<thead>
				<th class="col-sm-1">No</th>
				<th class="col-sm-1">Id Produk</th>
				<th class="col-sm-3">Nama</th>
				<th class="col-sm-1">Keterangan</th>
				</thead>
				<caption>Kurang Laku<a href=""></caption>
				<?php
			
				$Data="SELECT * FROM produk INNER JOIN centroid_temp ON produk.IdPrd=centroid_temp.IdPrd WHERE c3='1' AND iterasi='".$hasil['maksimal']."'";
				$result= $mysqli->query($Data);
				$no =1;
				if ($result->num_rows > 0) {
					while($b=$result->fetch_array()){
					echo'
						<tbody align="center">
							<tr>
								<td>'.$no++.'</td>
								<td>'.$b['IdPrd'].'</td>
								<td>'.$b['NamaPrd'].'</td>
								<td>Kurang Laku</td>
							</tr>
						</tbody>';
					}
				}
				?>
				</table>
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