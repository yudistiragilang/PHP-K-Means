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
		 </div>
		 <div style="padding:20px 0 10px 0; font-size:15px">
		 	<h4 align="center">Laporan Data Produk</h4>
		 </div>

		 <div style="padding:20px 0 10px 0; font-size:15px">
		 	periode : 
		 </div>

		 <table border="1px;" class="tabel">
		 	<tr>
		 		<th>No.</th>
		 		<th>Kode</th>
		 		<th>Judul</th>
		 		<th>Pengarang</th>
		 		<th>Penerbit</th>
		 		<th>Stok</th>
		 		<th>Harga</th>
		 	</tr>';
	$no = 1;
	$Data="SELECT * FROM produk";
	$result= $mysqli->query($Data);
	while($b=$result->fetch_array()){
		$content .='
			<tr>
				<td align="center ">'.$no++.'</td>
				<td align="center ">'.$b['IdPrd'].'</td>
				<td>'.$b['NamaPrd'].'</td>
				<td>'.$b['Pengarang'].'</td>
				<td>'.$b['Penerbit'].'</td>
				<td>'.$b['Qty'].'</td>
				<td>Rp '.number_format($b['Harga'], 2, ",",".").'</td>
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
	$html2pdf->Output('Laporan Produk.pdf');

?>