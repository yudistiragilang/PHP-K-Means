
<?php
session_start();
if(empty($_SESSION)){
  header("Location: ../index.php");
}

  include'../config.php';

	$id = $_GET['kode'];
			$SQL_DATA = $mysqli->query("SELECT * FROM member WHERE IdMember='$id'");
			$m = $SQL_DATA->fetch_array();

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
			<h4>Edit Member</h4>
		</div>
	</div>
	
	<?php
		if(isset($_POST["edit"])){
			
			$a=$_POST["id"];
			$b=$_POST["nama"];
			$c=$_POST["tempatlahir"];
			$d=$_POST["tgllahir"];
			$e=$_POST["jk"];
			$f=$_POST["hp"];
			$g=$_POST["alamatrumah"];
			$h=$_POST["tlprumah"];
			$i=$_POST["alamatkantor"];
			$j=$_POST["tlpkantor"];
			$k=$_POST["email"];
			
			$SQL=$mysqli->query("UPDATE member SET Nama='$b', TempatLahir='$c', TanggalLahir='$d', JenisKelamin='$e', NoHp='$f', AlamatRumah='$g', TeleponRumah='$h', AlamatKantor='$i', TeleponKantor='$j', Email='$k' WHERE IdMember='$a'");
			
			if($SQL){
				echo"<script>window.alert('DATA BERHASIL DISIMPAN');;window.location='member.php'</script>";
			}else{
				echo"<script>window.alert('DATA GAGAL DISIMPAN');;window.location='member.php'</script>";
			}
		}
	echo"
	<div class='row'>
		<form class='form-horizontal' role='form' action='' method='POST'>
			<div class='col-md-6'>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='id'>Id Member</label>
					<div class='col-sm-8'>
					<input type='text' readonly name='id' class='form-control' value='".$m['IdMember']."'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='nama'>Nama Member</label>
					<div class='col-sm-8'>
					<input type='text' name='nama' class='form-control' value='".$m['Nama']."'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='tempatlahir'>Tempat Lahir</label>
					<div class='col-sm-8'>
					<input type='text' name='tempatlahir' class='form-control' value='".$m['TempatLahir']."'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='tgllahir'>Tanggal Lahir</label>
					<div class='col-sm-8'>
					<input id='tanggal' type='text' name='tgllahir' class='form-control' value='".$m['TanggalLahir']."'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='jk'>Jenis Kelamin</label>
					<div class='col-sm-8'>";
				if ($m['JenisKelamin']=='Laki-laki') {
					echo '
					<input type="radio" name="jk" value="Laki-laki" checked> Laki - laki
					<input type="radio" name="jk" value="Perempuan" > Perempuan
					';
				} else {
					echo ' 
					<input type="radio" name="jk" value="Laki-laki" > Laki - laki
					<input type="radio" name="jk" value="Perempuan" checked> Perempuan
					';
				}
				echo"
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='hp'>Nomor HP</label>
					<div class='col-sm-8'>
					<input type='text' name='hp' class='form-control' value='".$m['NoHp']."'>
					</div>
				</div>
			</div>
			
			<div class='col-md-6'>
				
				<div class='form-group'>
					<label class='control-label col-sm-4' for='alamatrumah'>Alamat Rumah</label>
					<div class='col-sm-8'>
					<input type='text' name='alamatrumah' class='form-control' value='".$m['AlamatRumah']."'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='tlprumah'>Telepon Rumah</label>
					<div class='col-sm-8'>
					<input type='text' name='tlprumah' class='form-control' value='".$m['TeleponRumah']."'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='alamatkantor'>Alamat Kantor</label>
					<div class='col-sm-8'>
					<input type='text' name='alamatkantor' class='form-control' value='".$m['AlamatKantor']."'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='tlpkantor'>Telepon Kantor</label>
					<div class='col-sm-8'>
					<input type='text' name='tlpkantor' class='form-control' value='".$m['TeleponKantor']."'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='email'>E-Mail</label>
					<div class='col-sm-8'>
					<input type='text' name='email' class='form-control' value='".$m['Email']."'>
					</div>
				</div>
				<div class='form-group'>
					<div class='col-sm-offset-6 col-sm-10'>
					<button type='submit' class='btn btn-success' name='edit'>EDIT</button>
					<a href='member.php' class='btn btn-warning'>Batal</a>
					</div>
				</div>
			</div>
		</form>
		</div>";?>
				<script type="text/javascript">
					$(document).ready(function(){
						$("#tanggal").datepicker({
							dateFormat : 'yy/mm/dd',
							yearRange:'-25:+5',
							changeMonth: true,
							changeYear:true});							
					});
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