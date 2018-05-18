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
		font-size:11px;
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
	<h1>Data Hasil Iterasi</h1>

	<div id="body">
	<a href="<?php echo base_url(); ?>kmeans/">Ulang Perhitungan</a><br><br>
	
	<?php
		foreach($q->result_array() as $hq)
		{
	?>
	<center><h3>Iterasi ke-<?php echo $hq['iterasi']; ?></h3></center>
	<table cellpadding="0" border="1" cellspacing="0" width="100%">
		<tr align="center"><td>C1</td><td>C2</td><td>C3</td></tr>
		<?php
			$q2 = $this->db->query('select * from centroid_temp where iterasi='.$hq['iterasi'].'');
			foreach($q2->result() as $tq)
			{
			$warna1="";
			$warna2="";
			$warna3="";
			if($tq->c1==1){$warna1='#FFFF00';} else{$warna1='#EAEAEA';}
			if($tq->c2==1){$warna2='#FFFF00';} else{$warna2='#EAEAEA';}
			if($tq->c3==1){$warna3='#FFFF00';} else{$warna3='#EAEAEA';}
		?>
		<tr align="center"><td bgcolor="<?php echo $warna1; ?>"><?php echo $tq->c1; ?></td><td bgcolor="<?php echo $warna2; ?>"><?php echo $tq->c2; ?></td><td bgcolor="<?php echo $warna3; ?>"><?php echo $tq->c3; ?></td></tr>
		<?php
			}
		?>
	</table>
	<?php
		}
	?>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>