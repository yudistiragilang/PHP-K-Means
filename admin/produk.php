
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

	$cari=mysqli_query($mysqli,"SELECT MAX(IdPrd) FROM produk");
	$data=mysqli_fetch_array($cari);			
		if($data) {
			$nilaikode = substr($data[0], 1);
			// menjadikan $nilaikode ( int )
			$kode = (int) $nilaikode;
			// setiap $kode di tambah 1
			$kode = $kode + 1;
			$kode_otomatis = "P".str_pad($kode, 8, "0", STR_PAD_LEFT);
			} else {
			$kode_otomatis = "P00000001";
			}
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
<!--  <script src="js/jquery.min.js"></script> -->
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
				<li class="active"><a href="produk.php">Data Produk</a></li>
			</ul>
		</li>
		<li><a href="brgmasuk.php">STO</a></li>
		<li><a href="laporansto.php">Laporan</a></li>
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
			<h4>Kelola Produk</h4>
		</div>
	</div>
	
	<?php
		if(isset($_POST['simpan'])){
			
			$a=$kode_otomatis;
			$b=$_POST['nama'];
			$c=$_POST['pengarang'];
			$d=$_POST['penerbit'];
			$e=$_POST['qty'];
			$f=$_POST['harga'];
			$g=0;
			
			$SQL=("INSERT INTO produk VALUES('$a','$b','$c','$d','$e','$f','$g')");
			
			if($mysqli->query($SQL) == true) {
				echo"<script>window.alert('DATA BERHASIL DISIMPAN');;window.location='produk.php'</script>";
			}else{
				echo"<script>window.alert('DATA GAGAL DISIMPAN');;window.location='produk.php'</script>";
			}
		}
	
	echo"
	<div class='row'>
		<form class='form-horizontal' role='form' action='' method='POST'>
			<div class='col-md-5'>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='id'>Id Produk</label>
					<div class='col-sm-8'>";?>
					<?php
			
						$cari=mysqli_query($mysqli,"SELECT MAX(IdPrd) FROM produk");
						$data=mysqli_fetch_array($cari);
				
						if($data) {
							$nilaikode = substr($data[0], 1);
						// menjadikan $nilaikode ( int )
							$kode = (int) $nilaikode;
						// setiap $kode di tambah 1
							$kode = $kode + 1;
							$kode_otomatis = "P".str_pad($kode, 8, "0", STR_PAD_LEFT);
						} else {
						$kode_otomatis = "P00000001";
						}
						echo"
						<input class='form-control' type='text' readonly name='id' value='".$kode_otomatis."'></td>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='nama'>Nama Produk</label>
					<div class='col-sm-8'>
					<input type='text' name='nama' required class='form-control' placeholder='Nama Produk . . .'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='pengarang'>Pengarang</label>
					<div class='col-sm-8'>
					<input type='text' name='pengarang' required class='form-control' placeholder='Pengarang . . .'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='penerbit'>Penerbit</label>
					<div class='col-sm-8'>
					<input id='tanggal' type='text' name='penerbit' required class='form-control' placeholder='Penerbit . . .'>
					</div>
				</div>
			</div>
			<div class='col-md-5'>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='qty'>Jumlah</label>
					<div class='col-sm-8'>
					<input type='text' name='qty' class='form-control' required placeholder='Jumlah . . .'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='harga'>Harga Produk</label>
					<div class='col-sm-8'>
					<input type='text' name='harga' class='form-control' required placeholder='Harga Produk . . .'>
					</div>
				</div>
				<div class='form-group'>
					<div class='col-sm-offset-6 col-sm-10'>
					<button type='submit' class='btn btn-success' name='simpan'>SIMPAN</button>
					</div>
				</div>
			</div>
		</form>
	</div>";?>
	
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
				<form role="form" action="cari_act.php" method="GET">
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
				<th class="col-sm-2">Id Produk</th>
				<th class="col-sm-2">Nama</th>
				<th class="col-sm-2">Pengarang</th>
				<th class="col-sm-1">Penerbit</th>
				<th class="col-sm-1">Jumlah</th>
				<th class="col-sm-2">Harga</th>
				<th class="col-sm-1">Aksi</th>
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
								<td>
								<a href="epro.php?kode='.$b['IdPrd'].'" class="btn btn-warning">Edit</a>
								<a onclick="return hapus()" href="depro.php?kode='.$b['IdPrd'].'" class="btn btn-danger">Hapus</a>
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
				<script type="text/javascript" language="JavaScript">
					function hapus(){
						takon = confirm("Anda Yakin Akan Menghapus Data ?");
						if (takon == true) return true;
						else return false;
					}
				</script>
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