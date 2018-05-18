
<?php
include('../config.php');
include('../fungsia.php');

session_start();

if(cek_login($mysqli) == false){ // Jika user tidak login
	header('location: ../logina.php'); // Alihkan ke halaman login (login.php)
	exit();	
}

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
	$start = ($page - 1) * $page_rows;
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
      <a class="navbar-brand" href="index.php">Gil ! !</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Beranda</a></li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Hak Akses <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="aksesa.php">Hak Akses Admin</a></li>
            <li><a href="aksesk.php">Hak Akses Kasir</a></li>
            <li><a href="akseso.php">Hak Akses Owner</a></li>
          </ul>
        </li>
        <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Data Master <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li class="active"><a href="member.php">Data Member</a></li>
				<li><a href="produk.php">Data Produk</a></li>
			</ul>
		</li>
		<li><a href="brgmasuk.php">STO</a></li>
		<li><a href="#">Laporan</a></li>
      </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li><a href="logout.php"><span class=""></span> Logout</a></li>
	  </ul>
    </div>
  </div>
</nav>
  

 <div class="container">
 
  	<div class="jumbotron">
  		<h1>Elex Comic Center</h1>
   		<p>Jl. R.E Martadinata 165 - 167 <br>Surakarta</p> 
 	</div>
	
	<div class="row">
		<div class="col-md-12">
			<h4>Kelola Member</h4>
		</div>
	</div>
	
	<?php
		if(isset($_POST['simpan'])){
			
			$a=$_POST['id'];
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
			
			$SQL=("INSERT INTO member VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k')");
			
			if($mysqli->query($SQL) == true) {
				echo"<script>window.alert('DATA BERHASIL DISIMPAN');;window.location='member.php'</script>";
			}else{
				echo"<script>window.alert('DATA GAGAL DISIMPAN');;window.location='member.php'</script>";
			}
		}
	
	echo"
	<div class='row'>
		<form class='form-horizontal' role='form' action='' method='POST'>
			<div class='col-md-5'>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='id'>Id Member</label>
					<div class='col-sm-8'>
					<input type='text' name='id' required class='form-control' placeholder='Id Member . . .'>
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
				<th class="col-sm-1">Aksi</th>
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
				$no=1;
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
								<td>
								<a href="ember.php?kode='.$b['IdMember'].'" class="btn btn-warning">Edit</a>
								<a onclick="return hapus()" href="deler.php?kode='.$b['IdMember'].'" class="btn btn-danger">Hapus</a>
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

				<script type="text/javascript">
					$(document).ready(function(){
						$("#tanggal").datepicker({
							dateFormat : 'yy/mm/dd',
							yearRange:'-35:+5',
							changeMonth: true,
							changeYear:true});							
					});
				</script>

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
	<h4 align="center">.:Yudhistira Gilang Adisetyo:.</h4>
	<h4 align="center">yudhistiragilang22@gmail.com</h4>
	<h4 align="center">Copyright 2017</h4>
</div>
<!-- footer -->

	
</div>
</body>
</html>