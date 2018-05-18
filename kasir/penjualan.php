
<?php
session_start();
if(empty($_SESSION)){
  header("Location: ../index.php");
}


  include'../config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Transaksi Penjualan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../js/jquery-ui/jquery-ui.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/style1.css">
  <link rel="stylesheet" href="../css/style_a.css">
  <link rel="shortcut icon" href="../favicon.ico" />
  <link rel="stylesheet" href="../css/bootstrap.min.css">
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
           <a class="dropdown-toggle" data-toggle="dropdown" href="#">Lihat Data <span class="caret"></span></a>
           <ul class="dropdown-menu">
              <li><a href="member.php">Data Member</a></li>
              <li><a href="produk.php">Data Produk</a></li>
           </ul>
        </li>
		    <li class="active"><a href="penjualan.php">Transaksi</a></li>
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
		<form class="form-horizontal" role="form" action="" method="POST">
			<div class="col-md-5">
				
				<div class="form-group">
					<div class="col-sm-8">
						<input type="text" name="user" hidden value="$username">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-4" for="idjual">Kode Jual</label>
					<div class="col-sm-8">
						<?php
			
						$cari=mysqli_query($mysqli,"SELECT MAX(IdJual) FROM penjualan");
						$data=mysqli_fetch_array($cari);
				
						if($data) {
							$nilaikode = substr($data[0], 1);
						// menjadikan $nilaikode ( int )
							$kode = (int) $nilaikode;
						// setiap $kode di tambah 1
							$kode = $kode + 1;
							$kode_otomatis = "J".str_pad($kode, 8, "0", STR_PAD_LEFT);
						} else {
						$kode_otomatis = "J00000001";
						}
						echo'
						<input class="form-control" type="text" readonly name="idjual" value="'.$kode_otomatis.'"></td>';
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="tgl">Tanggal Jual</label>
					<div class="col-sm-8">
						<input value="<?php date_default_timezone_set("Asia/Jakarta"); echo date("Y-m-d");?>" readonly type="text" name="tgl" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-4" for="idmember">Member</label>
					<div class="col-sm-8">
						<select class="form-control" name="idmember" required>
                                <?php
                                    $resultPembeli = mysqli_query($mysqli, "select * from member");
                                    while($rsPembeli = $resultPembeli->fetch_array(MYSQLI_ASSOC)) {
                                        echo "<option value='".$rsPembeli['IdMember']."'>".$rsPembeli['Nama']."";
                                    }
                                ?>
						</select>
					</div>
				</div>
			</div>
			
			<div class="col-sm-5">
				<!-- InPUt Buku ??? -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="id">Id Buku</label>
					<div class="col-sm-8">
						<input type="text" name="idbuku" readonly id="p_name" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="namabuku">Nama</label>
					<div class="col-sm-8">
						<?php
							$SQL_Data = $mysqli->query("SELECT * FROM produk");  
							$jsArray = "var buku = new Array();\n";  
							echo '<select class="form-control" name="namabuku" onchange="changeValue(this.value)">';  
							echo '<option>-------</option>';  
							while ($row = mysqli_fetch_array($SQL_Data)) {  
								 echo'<option value="' . $row['NamaPrd'] . '">' . $row['NamaPrd'] . '</option>';    
								$jsArray .= "buku['" . $row['NamaPrd'] . "'] = {name:'" . addslashes($row['IdPrd']) . "',harga:'".addslashes($row['Harga'])."'};\n";    
							}  
							echo '<select/>';
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="hargabuku">Harga</label>
					<div class="col-sm-8">
						<input type="text" name="hargabuku" readonly id="p_harga" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="qty">Jumlah Beli</label>
					<div class="col-sm-8">
						<input type="text" name="qty" class="form-control" value="1">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-6">
						<!-- BUtton -->
						<button type="submit" class="btn btn-success" name="tambah">TAMBAH</button>
					</div>
				</div>
			</div>
			
		</form>

		<form  action="savejual.php" method="post">

		<table>
							<tr style="background-color:#E8DEBD">
							<th style="text-align:center">No.</th>
							<th style="text-align:center">Id Member</th>
							<th style="text-align:center">Judul Buku</th>
							<th style="text-align:center">Harga Buku</th>
							<th style="text-align:center">Jumlah Buku</th>
							<th style="text-align:center">Sub Total</th>
							<!-- <th style="text-align:center">Aksi</th> -->
							<th style="text-align:center" hidden>Kode Buku</th>
			<?php
			$awal=1;$sub=0;$total=0;
			if (@$_POST["namabuku"]!=''){
				if (empty($_SESSION["isi"])==TRUE){
					$_SESSION["isi"]=1;
				}else{
					$_SESSION["isi"]++;
				}
				@$NamaBuku = $_POST['namabuku'];
				$tampil = mysqli_fetch_array(mysqli_query($mysqli,"select NamaPrd, Harga from produk where NamaPrd = '$NamaBuku'"));
				@$NamaBuku= $tampil["NamaPrd"];
				@$HargaBuku=$tampil["Harga"];
				@$Stock=trim($_POST["qty"]);
				@$member=trim($_POST["idmember"]);
				@$sub=$HargaBuku*$Stock;
				$tampilid=mysqli_fetch_array(mysqli_query($mysqli,"select IdPrd from produk where NamaPrd='$NamaBuku'"));
				@$KodeBuku=$tampilid["IdPrd"];
				
				
				//@$xx=$xx+$sub;
				$_SESSION["akhir"][$_SESSION["isi"]]=array($member,$NamaBuku,$HargaBuku,$Stock,$sub,$KodeBuku);
			}//else{
				//echo "<script type='text/javascript'>alert('Silahkan isi terlebih dahulu!')</script>";
			//}
				
				@$awal = $_SESSION["isi"];
				
				for ($i=0;$i<=$awal;$i++) {
				if (@$_SESSION['akhir'][$i][0]!=''){ ?>
					<tr>
							<td><?php echo $i ?></td>
							<td><?php echo @$_SESSION['akhir'][$i][0] ?></td>
							<td><?php echo @$_SESSION['akhir'][$i][1] ?></td>
							<td><?php echo @$_SESSION['akhir'][$i][2] ?></td>
							<td><?php echo @$_SESSION['akhir'][$i][3] ?></td>
							<td><?php echo @$_SESSION['akhir'][$i][4] ?></td>

				
				<!--			<td><?php// echo'<a onclick="return hapus()" href="destroy.php?kode='.@$_SESSION['akhir'][$i][5].'" class="btn btn-danger">Hapus</a>'; ?></td> -->

							<td hidden><?php echo @$_SESSION['akhir'][$i][5] ?></td>
					</tr>
						
					
					<?php }
					$total=@$_SESSION['akhir'][$i][4]+$total;
					@$_SESSION['total'] = $total;
					$mem=@$_SESSION['akhir'][$i][0];
					@$_SESSION['member']= $mem;

				}
			
			?>
			
			<tr>
			
			<tr>
				<td colspan=5>
				<?php echo "Grand Bayar";?>
				</td>
					<td>
					<input name="total" value=" <?php echo " Rp. $total";?> " readonly/>
					</td>
			</tr>
			<tr>
			<td colspan=6 align="center">
							<input type='submit' value="Save" name="Simpan"/>
							<a onclick="return hapus()" href='destroy.php'><input type='button' value='Hapus'></a>
			</td>
			</tr>			
			</tr>
						
			</table>
		</form>

	</div>
	
	<!-- footer -->
	<div class="page-header">
		<p align="center">.:Yudhistira Gilang Adisetyo:. yudhistiragilang22@gmail.com Copyright 2017</p>
	</div>
	<!-- footer -->
	
 </div>
</body>

	<script type="text/javascript">    
		<?php echo $jsArray; ?>  
			function changeValue(id){  
			document.getElementById('p_name').value = buku[id].name;
			document.getElementById('p_harga').value = buku[id].harga;
			};
	</script>

				<script type="text/javascript" language="JavaScript">
					function hapus(){
						takon = confirm("Anda Yakin Akan Menghapus Data ?");
						if (takon == true) return true;
						else return false;
					}
				</script>
	
</html>