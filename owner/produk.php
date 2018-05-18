
<?php
session_start();
if(empty($_SESSION)){
  header("Location: ../index.php");
}


  include'../config.php';

	$DATA = "SELECT COUNT(IdPrd) FROM produk";
	$jumlah = mysqli_query($mysqli, $DATA);
	$row = mysqli_fetch_row($jumlah);

	// disini memiliki total jumlah baris
	$rows = $row[0];

	// variabel yang digunakan untuk membatasi data yang ditampilkan
	$page_rows = 10;

	// membantu halaman membuat halaman terakhir ceil adalah membulatkan data koma
	$halaman=ceil($rows / $page_rows);
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
//	$start = ($page - 1) * $page_rows;
	$start = ($page > 1) ? ($page * $page_rows) - $page_rows : 0;
//	$start = ($page - 1) ? * $page_rows;
	$no=$start + 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Data Produk</title>
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
        <li class="active"><a href="produk.php">Produk</a></li>
        <li><a href="sto.php">Laporan STO</a></li>
        <li><a href="penjualan.php">Laporan Penjualan</a></li>
        <!-- <li><a href="../k-means/">Cluster Penjualan</a></li> -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Cluster Penjualan<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../k-means/">Proses K-Means</a></li>
            <li><a href="sl.php">Hasil Clustering</a></li>
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
			<h4>Data Produk</h4>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
				<table class="col-md-2" border="0">
					<tr>
						<td>Jumlah Record</td>		
						<td><?php echo $rows; ?></td>
					</tr>
					<tr>
						<td>Jumlah Halaman</td>	
						<td><?php echo $halaman; ?></td>
					</tr>
				</table>
			</div>
			<div class="col-md-4 col-md-offset-8">
				<form role="form" action="cari_act.php" method="GET">
				<div class="form-group">
					<input type="text" name="cari" placeholder="Masukan Nama">
					<button name="BtnCari" type="submit" class="btn btn-info">Cari</button><a target="_blank" href="../laporan/lapproduk.php" class="btn btn-default"><span class="glyphicon glyphicon-envelope"></span>Cetak</a>
				</div>
				</form>
			</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-hover">
				<thead>
				<th class="col-sm-1">No</th>
				<th class="col-sm-2">Id Produk</th>
				<th class="col-sm-2">Nama</th>
				<th class="col-sm-2">Pengarang</th>
				<th class="col-sm-1">Penerbit</th>
				<th class="col-sm-1">Jumlah</th>
				<th class="col-sm-2">Harga</th>
				</thead>
				<caption>Data Produk</caption>

				<?php

			if (isset($_GET['cari'])){
				$cari=mysql_real_escape_string($_GET['cari']);
				$Data="SELECT * FROM produk WHERE NamaPrd LIKE '%$cari%'";
				$result= $mysqli->query($Data);
			}else{
				$Data="SELECT * FROM produk LIMIT $start, $page_rows";
				$result= $mysqli->query($Data);
			}
				if ($result->num_rows > 0) {
					while($b=$result->fetch_array()){
					echo'
						<tbody>
							<tr class="active">
								<td>'.$no++.'</td>
								<td>'.$b['IdPrd'].'</td>
								<td>'.$b['NamaPrd'].'</td>
								<td>'.$b['Pengarang'].'</td>
								<td>'.$b['Penerbit'].'</td>
								<td>'.$b['Qty'].'</td>
								<td>'.$b['Harga'].'</td>
							</tr>
						</tbody>';
					}
				}
				?>
				</table>

				<!-- paging -->
				<ul class="pagination">			
					<?php 
					for($x=1;$x<=$halaman;$x++){
					echo"
					<li><a href='?page=  $x '>  $x </a></li>";	
					
					}
					?>					
				</ul>
			<!-- paging -->
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