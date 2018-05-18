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
			width: 100%;

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
	$sql = "SELECT * FROM sto WHERE IdSto='$id'";
	$result = mysqli_query($mysqli, $sql);
	while($r = mysqli_fetch_array($result)){
		$kode=$r['IdSto'];
		$tanggaltransaksi=$r['TglSto'];
		$grandtotal=$r['GrandSto'];
	}

	$content .='
		 <div style="padding:20px 0 10px 0; font-size:15px">
		 	<table border="1" >
		 	 <tr>
		 	 	<td> Kode Penjualan :'.$kode.'</td>	
		 	 	<td> Tanggal Penjualan :'.$tanggaltransaksi.'</td>
		 	 </tr>
		 	 <tr>
		 	 	<td colspan="2"> Total Bayar :Rp. '.number_format($grandtotal, 2, ",",".").'</td>
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
	$sql = "SELECT * FROM detsto INNER JOIN produk ON produk.IdPrd=detsto.IdPrd WHERE IdSto='$id'";
	$result = mysqli_query($mysqli, $sql);
	
	while($row = mysqli_fetch_array($result)){
		$total = $row['JmlSto']*$row['HrgSto'];
		$content .='
			<tr>
				<td align="center ">'.$no++.'</td>
				<td align="center ">'.$row['IdPrd'].'</td>
				<td align="center ">'.$row['NamaPrd'].'</td>
				<td align="center ">'.$row['JmlSto'].'</td>
				<td align="center ">Rp. '.number_format($total, 2, ",",".").'</td>
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
	$html2pdf->Output('Laporan Sto.pdf');

?>