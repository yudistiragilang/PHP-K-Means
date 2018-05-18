
<?php
	session_start();
	if(empty($_SESSION)){
	  header("Location: ../index.php");
	}

	  include'../config.php';

	$DATA = "SELECT COUNT(IdSto) FROM sto";
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
    <li class="active"><a href="laporansto.php">Laporan</a></li>
      </ul>
    <ul class="nav navbar-nav navbar-right">
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
			<h4>Detail STO</h4>
		</div>
	</div>

	<div class="row">
		
	
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-bordered">
				<thead>
				<th class="col-sm-1">No</th>
				<th hidden="hidden">Id Sto</th>
				<th class="col-sm-3">Nama Produk</th>
				<th class="col-sm-1">Jumlah</th>
				<th class="col-sm-1">Harga</th>
				<th class="col-sm-1">Total</th>
				</thead>
				<caption>Data STO</caption>
				<?php

				$id=$_GET['kode'];
				$Data="SELECT * FROM detsto INNER JOIN produk ON produk.IdPrd=detsto.IdPrd WHERE IdSto='$id'";
				$result= $mysqli->query($Data);
				$no=1;
				if ($result->num_rows > 0) {
					while($b=$result->fetch_array()){
						$total=$b['HrgSto']*$b['JmlSto'];
					echo'
						<tbody align="center">
							<tr>
								<td>'.$no++.'</td>
								<td hidden>'.$b['IdDetSto'].'</td>
								<td>'.$b['NamaPrd'].'</td>
								<td>'.$b['JmlSto'].'</td>
								<td>'.$b['HrgSto'].'</td>
								<td>'.$total.'</td>								
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