
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
  <title>Data Member</title>
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
		<li class="dropdown">
			     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Lihat Data <span class="caret"></span></a>
			     <ul class="dropdown-menu">
				      <li class="active"><a href="member.php">Data Member</a></li>
				      <li><a href="produk.php">Data Produk</a></li>
			     </ul>
		</li>
		<li><a href="penjualan.php">Transaksi</a></li>
		<li><a href="laporanjual.php">Laporan</a></li>
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
			<h4>Kelola Member</h4>
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
			<div class="col-md-3 col-md-offset-9">
				<form role="form" action="cari_actm.php" method="GET">
				<div class="form-group">
					<input type="text" name="cari" placeholder="Masukan Nama">
					<button name="BtnCari" type="submit" class="btn btn-info">Cari</button>
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
				<th hidden="hidden">Id Member</th>
				<th class="col-sm-3">Nama</th>
				<th class="col-sm-1">Tempat Lahir</th>
				<th class="col-sm-1">Tanggal Lahir</th>
				<th class="col-sm-1">Jenis Kelamin</th>
				<th class="col-sm-1">Nomor HP</th>
				<th hidden="hidden">Alamat Rumah</th>
				<th hidden="hidden">Telepon Rumah</th>
				<th hidden="hidden">Alamat Kantor</th>
				<th hidden="hidden">Telepon Kantor</th>
				<th class="col-sm-1">E-Mail</th>
				</thead>
				<caption>Data Member</caption>
				<?php

			if (isset($_GET['cari'])){
				$cari=mysql_real_escape_string($_GET['cari']);
				$Data="SELECT * FROM member WHERE Nama LIKE '%$cari%'";
				$result= $mysqli->query($Data);
			}else{
				$Data="SELECT * FROM member LIMIT $start, $page_rows";
				$result= $mysqli->query($Data);
			}
				if ($result->num_rows > 0) {
					while($b=$result->fetch_array()){
					echo'
						<tbody align="center">
							<tr>
								<td>'.$no++.'</td>
								<td hidden>'.$b['IdMember'].'</td>
								<td>'.$b['Nama'].'</td>
								<td>'.$b['TempatLahir'].'</td>
								<td>'.$b['TanggalLahir'].'</td>
								<td>'.$b['JenisKelamin'].'</td>
								<td>'.$b['NoHp'].'</td>
								<td hidden>'.$b['AlamatRumah'].'</td>
								<td hidden>'.$b['TeleponRumah'].'</td>
								<td hidden>'.$b['AlamatKantor'].'</td>
								<td hidden>'.$b['TeleponKantor'].'</td>
								<td>'.$b['Email'].'</td>
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