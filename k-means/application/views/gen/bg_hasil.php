<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>K-Means</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	a{
	padding:10px;
	color:#FF3300;
	font-weight:bold;
	border:1px solid #666666;
	background-color:#FFFFCC;
	text-decoration:none;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Data Akhir</h1>

	<div id="body">
	<a href="<?php echo base_url(); ?>gen/rata_rata">Proses Data Rata-Rata</a> <a href="<?php echo base_url(); ?>gen/step1">Proses Data Akhir</a><br><br>
	<table cellpadding="5" border="1" cellspacing="0" width="100%">
		<tr><td>Centroid 1</td><td>Sangat Baik</td><td><?php echo $c1; ?></td></tr>
		<tr><td>Centroid 2</td><td>Baik</td><td><?php echo $c2; ?></td></tr>
		<tr><td>Centroid 3</td><td>Cukup</td><td><?php echo $c3; ?></td></tr>
		<tr><td>Centroid 4</td><td>Kurang</td><td><?php echo $c4; ?></td></tr>
		<tr><td>Centroid 5</td><td>Kurang Sekali</td><td><?php echo $c5; ?></td></tr>
	</table>
	<br>
	<br>
	<table cellpadding="5" border="1" cellspacing="0" width="100%">
		<tr align="center">
			<td>Kode</td>
			<td>Judul</td>
			<td>Transaksi</td>
			<td>Total Transaksi</td>
			<td colspan="5">Distance</td>
			<td>Predikat</td>
		</tr>
		<?php foreach($produk->result_array() as $s){ ?>
		<tr>
			<td><?php echo $s['IdPrd']; ?></td>
			<td><?php echo $s['NamaPrd']; ?></td>
			<td><?php echo $s['transaksi']; ?></td>
			<td><?php echo $s['rata_rata']; ?></td>
			<td><?php echo $s['d1']; ?></td>
			<td><?php echo $s['d2']; ?></td>
			<td><?php echo $s['d3']; ?></td>
			<td><?php echo $s['d4']; ?></td>
			<td><?php echo $s['d5']; ?></td>
			<td><?php echo $s['predikat']; ?></td></tr>
		<?php } ?>
	</table>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>