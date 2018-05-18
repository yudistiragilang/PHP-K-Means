<?php
session_start();
if(empty($_SESSION)){
  header("Location: ../index.php");
}

  include'../config.php';

	$cari=mysqli_query($mysqli,"SELECT MAX(IdSto) FROM sto");
	$data=mysqli_fetch_array($cari);
				
	if($data) {
	$nilaikode = substr($data[0], 1);
	// menjadikan $nilaikode ( int )
	$kode = (int) $nilaikode;
	// setiap $kode di tambah 1
	$kode = $kode + 1;
	$kode_otomatis = "S".str_pad($kode, 8, "0", STR_PAD_LEFT);
	} else {
	$kode_otomatis = "S00000001";
	}
	date_default_timezone_set("Asia/Jakarta");
	$tanggal = date("y-m-d");

	$total=$_SESSION['total'];

	$SQL = $mysqli->query ("INSERT INTO sto(IdSto, TglSto, GrandSto)VALUES('$kode_otomatis','$tanggal','$total')");
//	if(($SQL) == true) {
//				echo"<script>window.alert('DATA BERHASIL DISIMPAN');;window.location='sewa.php'</script>";
//			}else{
//				echo"<script>window.alert('DATA GAGAL DISIMPAN');;window.location='sewa.php'</script>";
//			}

	$awal = $_SESSION['isi'];
	$j=0;
	while($j <= $awal){
		$KodeBuku = @$_SESSION['akhir'][$j][4];
		$Harga= @$_SESSION['akhir'][$j][1];
		$Jumlah = @$_SESSION['akhir'][$j][2];

		// Input Multi
		if($kode_otomatis!="" and $KodeBuku!="" and $Jumlah!=""){
			$query = $mysqli->query ("INSERT INTO detsto (IdSto,IdPrd,JmlSto,HrgSto)VALUES('$kode_otomatis','$KodeBuku','$Jumlah','$Harga')");


		// mengambil data deposit
			$SQL= $mysqli->query("SELECT Qty FROM produk WHERE IdPrd='$KodeBuku'");
			$DATA=mysqli_fetch_array($SQL);
			@$Qty=$DATA['Qty'];
			@$Sisa=$Qty+$Jumlah;

		// Mengubah status member menjadi sewa
			$Update = $mysqli->query("UPDATE produk SET Qty='$Sisa' WHERE IdPrd='$KodeBuku'");
		
		}
		$j++;
	}
	echo "<script type='text/javascript'>alert('Data berhasil disimpan')</script>";
	echo "<script>document.location.href='brgmasuk.php';</script>";
	unset($_SESSION['isi']);
	unset($_SESSION['nilai']);
	echo "".mysqli_error();

?>