
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
		<li class="dropdown">
			     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Lihat Data <span class="caret"></span></a>
			     <ul class="dropdown-menu">
				      <li><a href="member.php">Data Member</a></li>
				      <li><a href="produk.php">Data Produk</a></li>
			     </ul>
		</li>
		<li><a href="penjualan.php">Transaksi</a></li>
		<li class="active"><a href="laporanjual.php">Laporan</a></li>
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
			<h4>Rekap Penjualan</h4>
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
		<?php
		echo'
			<div class="col-md-4 col-md-offset-8">
				<form role="form" action="" method="POST">
				<div class="form-group">
					<input type="date" name="tgl1" placeholder="Tanggal Awal">
					<input type="date" name="tgl2" placeholder="Tanggal Akhir">
					<!-- <input type="date" name="cari" placeholder="Tanggal"> -->
					<button name="BtnCari" type="submit" class="btn btn-info">Cari</button>
				</div>
				</form>
			</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-bordered">
				<thead align="center" >
				<th class="col-sm-1">No</th>
				<th hidden="hidden">Id Jual</th>
				<th class="col-sm-3">Tanggal Jual</th>
				<th class="col-sm-1">Grand Total</th>
				<th class="col-sm-1">Aksi</th>
				</thead>
				<caption>Data Penjualan</caption>';

			if (isset($_POST['BtnCari'])) {
				$tgl1=$_POST['tgl1'];
				$tgl2=$_POST['tgl2'];
				
				$Data="SELECT * FROM penjualan WHERE (TglTransaksi BETWEEN '$tgl1' AND '$tgl2')";
				//$Data="SELECT * FROM penjualan WHERE TglTransaksi='$cari'";
				$result= $mysqli->query($Data);

			}else{
				$Data="SELECT * FROM penjualan LIMIT $start, $page_rows";
				$result= $mysqli->query($Data);
			}
				$no=1;
				//echo$Data;
				if ($result->num_rows > 0) {
					while($b=$result->fetch_array()){
					echo'
						<tbody align="center">
							<tr>
								<td>'.$no++.'</td>
								<td hidden>'.$b['IdJual'].'</td>
								<td>'.$b['TglTransaksi'].'</td>
								<td>'.$b['GrandTotal'].'</td>
								<td>
									<a href="detjual.php?kode='.$b['IdJual'].'" class="btn btn-info">Detail</a>
								</td>
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