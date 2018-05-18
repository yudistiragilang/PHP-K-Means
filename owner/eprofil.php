
<?php
session_start();
if(empty($_SESSION)){
  header("Location: ../index.php");
}


  include'../config.php';
  $username=$_SESSION['username'];

  	$id = $_GET['kode'];
	$SQL_DATA = $mysqli->query("SELECT * FROM users WHERE id='$id'");
	$pel = $SQL_DATA->fetch_array();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Halaman Owner</title>
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
        <li><a href="member.php">Member</a></li>
        <li><a href="produk.php">Produk</a></li>
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
        <li class="active"><a href="profil.php">Profil</a></li>
        <li><a href="logout.php"><span class=""></span> Logout</a></li>
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
        <p>Selamat datang kembali <?php echo $username; ?></p>
      </div> 
 	  </div>


    
    <div class="row">
      <?php

		if(isset($_POST["ubah"])) {

			$a=$_POST["id"];
			$b=$_POST["username"];
			$c=md5($_POST["password"]);
			$d=$_POST["nama"];
			$e=$_POST["alamat"];
			$f=$_POST["hp"];
			$g=$_POST["email"];

			$sql="UPDATE users SET username='$b',password='$c',nama='$d',alamat='$e',telepon='$f',email='$g' WHERE id='$a'";
			$hasil=mysqli_query($mysqli,$sql);

			if($hasil) {
				echo"<script>window.alert('DATA BERHASIL DISIMPAN');;window.location='../owner/profil.php'</script>";
			} 
				else {
					echo $mysqli->error;
				}			
		}

			echo"

		<div class='row'>
			<form class='form-horizontal' role='form' action='' method='POST' enctype='multipart/form-data'>
				<div class='col-md-5'>
					<div class='form-group'>
						<label for='id' class='control-label col-sm-4'>Kode</label>
						<div class='col-md-8'>
						<input readonly required type='text' name='id' class='form-control' value='".$pel['id']."'>
						</div>
					</div>
					<div class='form-group'>
						<label for='username' class='control-label col-sm-4'>Username</label>
						<div class='col-md-8'>
						<input required type='text' name='username' class='form-control' value='".$pel['username']."'>
						</div>
					</div>
					<div class='form-group'>
						<label for='password' class='control-label col-sm-4'>Password</label>
						<div class='col-md-8'>
						<input required type='text' name='password' class='form-control' value='".$pel['password']."'>
						</div>
					</div>
					<div class='form-group'>
						<label for='nama' class='control-label col-sm-4'>Nama</label>
						<div class='col-md-8'>
						<input required type='text' name='nama' class='form-control' value='".$pel['nama']."'>
						</div>
					</div>
					<div class='form-group'>
						<label for='alamat' class='control-label col-sm-4'>Jenis Buku</label>
						<div class='col-md-8'>
						<input required type='text' name='alamat' class='form-control' value='".$pel['alamat']."'>
						</div>
					</div>
				</div>

				<div class='col-md-5'>
					<div class='form-group'>
						<label for='hp' class='control-label col-sm-4'>Handphone</label>
						<div class='col-md-8'>
						<input required type='text' name='hp' class='form-control' value='".$pel['telepon']."'></br>
						</div>
					</div>
					<div class='form-group'>
						<label for='email' class='control-label col-sm-4'>Email</label>
						<div class='col-md-8'>
						<input required type='text' name='email' class='form-control' value='".$pel['email']."'></br>
						</div>
					</div>
					<div class='form-group'>
						<div class='col-sm-offset-6 col-sm-10'>
						<input type='submit' name='ubah' class='btn btn-primary' value='Simpan'>
						</div>
					</div>
				</div>	
			</form>
		</div>";
		?>
            
    </div>
	<!-- footer -->
	<div class="page-header">
		<p align="center">.:Yudhistira Gilang Adisetyo:. yudhistiragilang22@gmail.com Copyright 2017</p>
	</div>
	<!-- footer -->
  </div>
</body>
</html>