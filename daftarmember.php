
<?php
	session_start();

	  include'config.php';	
	$cari=mysqli_query($mysqli,"SELECT MAX(IdMember) FROM member");
	$data=mysqli_fetch_array($cari);	
		if($data) {
			$nilaikode = substr($data[0], 1);
			// menjadikan $nilaikode ( int )
			$kode = (int) $nilaikode;
			// setiap $kode di tambah 1
			$kode = $kode + 1;
			$kode_otomatis = "M".str_pad($kode, 8, "0", STR_PAD_LEFT);
			} else {
			$kode_otomatis = "M00000001";
			}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Daftar Member</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="js/jquery-ui/jquery-ui.css">
  <link rel="shortcut icon" href="favicon.ico" />
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui/jquery-ui.js"></script>
  <script src="js/bootstrap.min.js"></script> 
  
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
  </div>
</nav>
  

 <div class="container">
 
  	<div class="jumbotron">
  		<img src="gambar/logo.png" class="img-rounded" alt="Lights" style="width:100%"> 
 	</div>
	
	<div class="row">
		<div class="col-md-12">
			<h4>Daftar Member</h4>
		</div>
	</div>
	
	<?php

		if(isset($_POST['simpan'])){
			$a=$kode_otomatis;
			$b=$_POST['nama'];
			$c=$_POST['tempatlahir'];
			$d=$_POST['tgllahir'];
			$e=$_POST['jk'];
			$f=$_POST['hp'];
			$g=$_POST['alamatrumah'];
			$h=$_POST['tlprumah'];
			$i=$_POST['alamatkantor'];
			$j=$_POST['tlpkantor'];
			$k=$_POST['email'];
			$l='belumterverifikasi';
			
			$SQL=("INSERT INTO member VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l')");
			
			if($mysqli->query($SQL) == true) {
				echo"<script>window.alert('DATA BERHASIL DISIMPAN');;window.location='daftarmember.php'</script>";
			}else{
				echo"<script>window.alert('DATA GAGAL DISIMPAN');;window.location='daftarmember.php'</script>";
			}
		}
	
	echo"
	<div class='row'>
		<form class='form-horizontal' role='form' action='' method='POST'>
			<div class='col-md-5'>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='id'>Id Member</label>
					<div class='col-sm-8'>";?>
					<?php
			
						$cari=mysqli_query($mysqli,"SELECT MAX(IdMember) FROM member");
						$data=mysqli_fetch_array($cari);
				
						if($data) {
							$nilaikode = substr($data[0], 1);
						// menjadikan $nilaikode ( int )
							$kode = (int) $nilaikode;
						// setiap $kode di tambah 1
							$kode = $kode + 1;
							$kode_otomatis = "M".str_pad($kode, 8, "0", STR_PAD_LEFT);
						} else {
						$kode_otomatis = "M00000001";
						}
						echo"
						<input class='form-control' type='text' readonly name='id' value='".$kode_otomatis."'></td>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='nama'>Nama Member</label>
					<div class='col-sm-8'>
					<input type='text' name='nama' required class='form-control' placeholder='Nama Member . . .'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='tempatlahir'>Tempat Lahir</label>
					<div class='col-sm-8'>
					<input type='text' name='tempatlahir' required class='form-control' placeholder='Tempat Lahir . . .'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='tgllahir'>Tanggal Lahir</label>
					<div class='col-sm-8'>
					<input id='tanggal' type='text' name='tgllahir' required class='form-control' placeholder='Tanggal Lahir . . .'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='jk'>Jenis Kelamin</label>
					<div class='col-sm-8'>
					<input type='radio' name='jk' required value='Laki-laki' checked>Laki-laki
					<input type='radio' name='jk' required value='Perempuan'>Perempuan
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='hp'>Nomor HP</label>
					<div class='col-sm-8'>
					<input type='text' name='hp' required class='form-control' placeholder='Nomor HP . . .'>
					</div>
				</div>
			</div>
			
			<div class='col-md-5'>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='alamatrumah'>Alamat Rumah</label>
					<div class='col-sm-8'>
					<input type='text' name='alamatrumah' required class='form-control' placeholder='Alamat Rumah . . .'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='tlprumah'>Telepon Rumah</label>
					<div class='col-sm-8'>
					<input type='text' name='tlprumah' required class='form-control' placeholder='Telepon Rumah . . .'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='alamatkantor'>Alamat Kantor</label>
					<div class='col-sm-8'>
					<input type='text' name='alamatkantor' required class='form-control' placeholder='Alamat Kantor . . .'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='tlpkantor'>Telepon Kantor</label>
					<div class='col-sm-8'>
					<input type='text' name='tlpkantor' required class='form-control' placeholder='Telepon Kantor . . .'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='email'>E-Mail</label>
					<div class='col-sm-8'>
					<input type='text' name='email' class='form-control' required placeholder='E-Mail . . .'>
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

	
	
	

				<script type="text/javascript">
					$(document).ready(function(){
						$("#tanggal").datepicker({
							dateFormat : 'yy/mm/dd',
							yearRange:'-35:+1',
							changeMonth: true,
							changeYear:true});							
					});
				</script>
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