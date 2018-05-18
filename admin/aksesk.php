
<?php
include('../config.php');
include('../fungsia.php');

session_start();

if(cek_login($mysqli) == false){ // Jika user tidak login
	header('location: ../logina.php'); // Alihkan ke halaman login (login.php)
	exit();	
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Hak Akses Kasir</title>
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
        <li><a href="index.php">Beranda</a></li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Hak Akses <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="aksesa.php">Hak Akses Admin</a></li>
				<li class="active"><a href="aksesk.php">Hak Akses Kasir</a></li>
				<li><a href="akseso.php">Hak Akses Owner</a></li>
			</ul>
		</li>
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
			<h4>Kelola Hak Akses Kasir</h4>
		</div>
	</div>
  	
	<?php

		if(isset($_POST["simpan"])) {

			$a=$_POST["id"];
			$b=$_POST["username"];
			$c=$_POST["password"];
			$d=$_POST["nama"];
			$e=$_POST["alamat"];
			$f=$_POST["telepon"];

			$sql="INSERT INTO kasir VALUES('$a','$b','$c','$d','$e','$f')";
			$hasil=mysqli_query($mysqli,$sql);

			if($hasil) {
				echo"<script>window.alert('DATA BERHASIL DISIMPAN');;window.location='aksesk.php'</script>";
			} else {
				echo $mysqli->error;
			}			
		}
			echo"

		<div class='row'>
			<div class='col-md-4'>
				<form role='form' action='' method='POST'>
					<h2>Input Hak Akses</h2>
					<div class='form-group' align='center'>
						<label for='id'>Id</label>
						<input readonly='readonly' required type='text' name='id' class='form-control' placeholder='Automatic Id . .'>
						<label for='username'>Username</label>
						<input type='text' required name='username' class='form-control' placeholder='Username . .'>
						<label for='password'>Password</label>
						<input type='text' required name='password' class='form-control' placeholder='Password . .'>
						<label for='nama'>Nama Kasir</label>
						<input type='text' required name='nama' class='form-control' placeholder='Nama Kasir . .'>
						<label for='alamat'>Alamat</label>
						<input type='text' required name='alamat' class='form-control' placeholder='Alamat Kasir . .'>
						<label for='telepon'>Telepon</label>
						<input type='text' required name='telepon' class='form-control' placeholder='Telepon Kasir . .'>
						<input type='submit' name='simpan' class='btn btn-primary' value='Simpan'>
					</div>
				
				</form>
			</div>
		";
	?>
	
			<div class="col-md-8">
				<div class="table-responsive">
				<table class="table table-bordered">
				<thead>
					<th class="col col-md-1 col-sm-1">No</th>
					<th class="col col-md-2 col-sm-2">Username</th>
					<th class="col col-md-2 col-sm-2">Password</th>
					<th class="col col-md-3 col-sm-3">Nama</th>
					<th class="col col-md-3 col-sm-3">Alamat</th>
					<th class="col col-md-2 col-sm-2">Telepon</th>
					<th class="col col-md-2 col-sm-2">Aksi</th>
				</thead>	
				<caption>Data Hak Akses Kasir</caption>
	<?php
	
		$Data="SELECT * FROM kasir";
		$result= $mysqli->query($Data);
		$no=1;
		if ($result->num_rows > 0) {
			while($b=$result->fetch_array()){
			echo'
				<tbody>
					<tr class="active">
						<td>'.$no++.'</td>
						<td hidden>'.$b['id'].'</td>
						<td>'.$b['username'].'</td>
						<td>'.$b['password'].'</td>
						<td>'.$b['NamaKasir'].'</td>
						<td>'.$b['AlamatKasir'].'</td>
						<td>'.$b['TlpKasir'].'</td>
						<td>
						<a href="eakk.php?kode='.$b['id'].'" class="btn btn-warning">Edit</a>
						<a onclick="return hapus()" href="delakk.php?kode='.$b['id'].'" class="btn btn-danger">Hapus</a>
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
		<h4 align="center">.:Yudhistira Gilang Adisetyo:.</h4>
		<h4 align="center">yudhistiragilang22@gmail.com</h4>
		<h4 align="center">Copyright 2017</h4>
	</div>
	<!-- footer -->
	
				<script type="text/javascript" language="JavaScript">
					function hapus(){
						takon = confirm("Anda Yakin Akan Menghapus Data ?");
						if (takon == true) return true;
						else return false;
					}
				</script>

</div>
</body>
</html>