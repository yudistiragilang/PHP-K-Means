<?php

			session_start();
			if(empty($_SESSION)){
			  header("Location: ../index.php");
			}

			  include'../config.php';
				
			$id = $_GET['kode'];
			$SQL_DATA = $mysqli->query("SELECT * FROM users WHERE id='$id'");
			$haka = $SQL_DATA->fetch_array();				
				
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title> Ubah Hak Akses</title>
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
        <li class="active"><a href="akses.php">Hak Akses</a></li>
		<!-- <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Hak Akses <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li class="active"><a href="aksesa.php">Hak Akses Admin</a></li>
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
		<li><a href="laporansto.php">Laporan</a></li>
      </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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
			<h4>Kelola Hak Akses</h4>
		</div>
	</div>
  	
	<?php

		if(isset($_POST["ubah"])) {

			$a=$_POST["id"];
			$b=$_POST["username"];
			$c=md5($_POST['password']);
			$d=$_POST["nama"];
			$i=$_POST["email"];
			$e=$_POST["alamat"];
			$f=$_POST["telepon"];
			$g=$_POST["level"];

			$sql=("UPDATE users SET username='$b', password='$c', nama='$d', alamat='$e', telepon='$f', email='$i', level='$g' WHERE id='$a'");
			$hasil=mysqli_query($mysqli,$sql);

			if($hasil) {
				echo"<script>window.alert('DATA BERHASIL DIUBAH');;window.location='akses.php'</script>";
			} else {
				echo $mysqli->error;
			}			
		}
			echo"

		<div class='row'>
			<div class='col-md-8 col-md-offset-2'>
				<form role='form' action='' method='POST'>
					<h2>Ubah Hak Akses</h2>
					<div class='form-group' align='center'>
					<div class='col-md-6'>
						<label for='id'>Id</label>
						<input readonly='readonly' required type='text' name='id' class='form-control' value='".$haka['id']."' placeholder='Automatic Id . .'>
						<label for='nama'>Username</label>
						<input type='text' required name='username' value='".$haka['username']."' class='form-control' placeholder='Username . .'>
						<label for='password'>Password</label>
						<input type='text' required name='password' value='".$haka['password']."' class='form-control' placeholder='Password . .'>
						<label for='nama'>Nama</label>
						<input type='text' required name='nama' value='".$haka['nama']."' class='form-control' placeholder='Nama Admin . .'>
						<label for='alamat'>Alamat</label>
						<input type='text' required name='alamat' value='".$haka['alamat']."' class='form-control' placeholder='Alamat Admin . .'>
					</div>
					<div class='col-md-6'>
						<label for='telepon'>Telepon</label>
						<input type='text' required name='telepon' value='".$haka['telepon']."' class='form-control' placeholder='Nomor Telepon . .'>
						<label for='email'>Email</label>
						<input type='text' required name='email' value='".$haka['email']."' class='form-control' placeholder='Email . .'>
						<label for='level'>Level</label>
						<select name='level' class='form-control' required>
			              <option value=''>Pilih Level User</option>
			              <option value='admin'>Administrator</option>
			              <option value='kasir'>Kasir</option>
			              <option value='pimpinan'>Pimpinan</option>
			            </select></br>
						<input type='submit' name='ubah' class='btn btn-primary' value='Ubah'>
					</div>
					</div>
				
				</form>
			</div>
		";
	?>
	
	
</div>
		
	<!-- footer -->
	<div class="page-header">
		<p align="center">.:Yudhistira Gilang Adisetyo:. yudhistiragilang22@gmail.com Copyright 2017</p>
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