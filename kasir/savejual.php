<?php
session_start();
if(empty($_SESSION)){
  header("Location: ../index.php");
}


  include'../config.php';
  

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
	date_default_timezone_set("Asia/Jakarta");
	$tanggal = date("y-m-d");

	$total=$_SESSION['total'];
	$member=$_SESSION['member'];

	$SQL = $mysqli->query ("INSERT INTO penjualan(IdJual, IdMember, TglTransaksi, GrandTotal)VALUES('$kode_otomatis','$member','$tanggal','$total')");
//	if(($SQL) == true) {
//				echo"<script>window.alert('DATA BERHASIL DISIMPAN');;window.location='sewa.php'</script>";
//			}else{
//				echo"<script>window.alert('DATA GAGAL DISIMPAN');;window.location='sewa.php'</script>";
//			}

	$awal = $_SESSION['isi'];
	$j=0;
	while($j <= $awal){
		$KodeBuku = @$_SESSION['akhir'][$j][5];
		$Harga= @$_SESSION['akhir'][$j][4];
		$Jumlah = @$_SESSION['akhir'][$j][3];
		$IdMember = @$_SESSION['akhir'][$j][0];

		// Input Multi
		if($kode_otomatis!="" and $KodeBuku!="" and $Jumlah!=""){
			$query = $mysqli->query ("INSERT INTO detjual (IdJual,IdPrd,Jumlah,Harga)VALUES('$kode_otomatis','$KodeBuku','$Jumlah','$Harga')");


		// mengurangi jumlah qty
			$SQL= $mysqli->query("SELECT Qty FROM produk WHERE IdPrd='$KodeBuku'");
			$DATA=mysqli_fetch_array($SQL);
			@$Qty=$DATA['Qty'];
			@$Sisa=$Qty-$Jumlah;
			$Update = $mysqli->query("UPDATE produk SET Qty='$Sisa' WHERE IdPrd='$KodeBuku'");
		// menambah jumlah transaksi
			$SQL= $mysqli->query("SELECT transaksi FROM produk WHERE IdPrd='$KodeBuku'");
			$DATA=mysqli_fetch_array($SQL);
			@$transaksiawal = $DATA['transaksi'];
			@$transaksiakir = $transaksiawal+$Jumlah;
			$Update = $mysqli->query("UPDATE produk SET transaksi='$transaksiakir' WHERE IdPrd='$KodeBuku'");
		}
		$j++;
	}
	echo "<script type='text/javascript'>alert('Data berhasil disimpan')</script>";
	echo "<script>document.location.href='penjualan.php';</script>";
	unset($_SESSION['isi']);
	unset($_SESSION['nilai']);
	echo "".mysqli_error();

?>