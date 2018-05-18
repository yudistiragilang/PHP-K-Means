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
		 	<h4 align="center">Laporan Data Member</h4>
		 </div>

		 <div style="padding:20px 0 10px 0; font-size:15px">
		 	periode : 
		 </div>

		 <table border="1px;" class="tabel">
		 	<tr>
		 		<th>No.</th>
		 		<th>Id Member</th>
		 		<th>Nama</th>
		 		<th>Alamat</th>
		 		<th>Telepon</th>
		 	</tr>';
	$no = 1;
	$Data="SELECT * FROM member";
	$result= $mysqli->query($Data);
	while($b=$result->fetch_array()){
		$content .='
			<tr>
				<td align="center ">'.$no++.'</td>
				<td align="center ">'.$b['IdMember'].'</td>
				<td>'.$b['Nama'].'</td>
				<td>'.$b['AlamatRumah'].'</td>
				<td>'.$b['NoHp'].'</td>
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
	$html2pdf->Output('Laporan Member'.$tanggal.'.pdf');

?>