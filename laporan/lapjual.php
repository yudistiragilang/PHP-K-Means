<?php

	session_start();
	if(empty($_SESSION)){
	  header("Location: ../index.php");
	}


	  include'../config.php';

	$content = '
		<style>
		.tabel{
			border-collapse:collapse;
			align: center;
		}
		.tabel th{
			padding:8px 20px; background-color:#f60; color:#fff;
		}
		.tabel td{
			padding:8px 10px;
		}

		</style>
	';

	$content .='
		<page>
		 <div style="padding:4mm; border:1px solid;" align="center">
		 	<table padding="8px" width="100%">
		 		<tr>
		 			<td rowspan="2"><img src="../gambar/log.png"></td>
		 			<td style="font-size:25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Elex Comic Center Surakarta</td>
		 		</tr>
		 		<tr>
		 			<td style="font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jl Martadinata No. 165 - 167 Surakarta</td>
		 		</tr>
		 	</table>
		 </div>';

	$id=$_GET['kode'];
	$no = 1;
	$sql = "SELECT * FROM penjualan WHERE IdJual='$id'";
	$result = mysqli_query($mysqli, $sql);
	while($r = mysqli_fetch_array($result)){
		$kode=$r['IdJual'];
		$member=$r['IdMember'];
		$tanggaltransaksi=$r['TglTransaksi'];
		$grandtotal=$r['GrandTotal'];
	}

	$content .='
		 <div style="padding:20px 0 10px 0; font-size:15px">
		 	<table>
		 	 <tr>
		 	 	<td> Kode Penjualan :'.$kode.'</td>	
		 	 	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tanggal Penjualan :'.$tanggaltransaksi.'</td>
		 	 </tr>
		 	 <tr>
		 	 	<td> Pembeli :'.$member.'</td>
		 	 	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Total Bayar :Rp. '.number_format($grandtotal, 2, ",",".").'</td>
		 	 </tr>
		 	</table>
		 </div>


		 <table border="1px;" class="tabel">
		 	<tr>
		 		<th>No.</th>
		 		<th>Kode</th>
		 		<th>Judul</th>
		 		<th>Jumlah</th>
		 		<th>Harga</th>
		 	</tr>';

	$id=$_GET['kode'];
	$no = 1;
//	 INNER JOIN penjualan ON penjualan.IdJual=detjual.IdJual
	$sql = "SELECT * FROM detjual INNER JOIN produk ON produk.IdPrd=detjual.IdPrd WHERE IdJual='$id'";
	$result = mysqli_query($mysqli, $sql);
	
	if (!$result) {
    	printf("Error: %s\n", mysqli_error($mysqli));
    	exit();
	}
	while($row = mysqli_fetch_array($result)){
		$content .='
			<tr>
				<td align="center ">'.$no++.'</td>
				<td align="center ">'.$row['IdPrd'].'</td>
				<td align="center ">'.$row['NamaPrd'].'</td>
				<td align="center ">'.$row['Jumlah'].'</td>
				<td align="center ">Rp. '.number_format($row['Harga'], 2, ",",".").'</td>
			</tr>
			
		';
	}

	date_default_timezone_set("Asia/Jakarta");
	$tanggal = date("y-m-d");
	$user = $_SESSION['username'];
	$data="SELECT nama FROM users WHERE username='$user'";
	$dapat= $mysqli->query($data);
	while ($b=$dapat->fetch_array()) {
		$nama= $b['nama'];
	}
	$content .='
		 </table>
		 <br>
		 <br>
		 <div align="right">
		 		Surakarta,'.$tanggal.'
				 <br>
				 <br>
				 <br>
				 <br>
				 ('.$nama.')
		 </div>
		</page>
	';


	require_once('../html2pdf/html2pdf.class.php');
	$html2pdf = new HTML2PDF('P','A4','en');
	$html2pdf->WriteHTML($content);
	$html2pdf->Output('Laporan Penjualan.pdf');

?>