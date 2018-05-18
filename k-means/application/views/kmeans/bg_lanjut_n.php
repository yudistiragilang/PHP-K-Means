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
	<h1>Data Proses Iterasi</h1>

	<div id="body">
	<a href="<?php echo base_url(); ?>kmeans/lanjut">Proses Iterasi Selanjutnya</a><br><br>
	<?php
		$c1a = "";
		$c1b = "";
		$c1c = "";
		
		$c2a = "";
		$c2b = "";
		$c2c = "";
		
		$c3a = "";
		$c3b = "";
		$c3c = "";
		foreach($centroid->result_array() as $c)
		{
			$c1a = $c['c1a'];
			$c1b = $c['c1b'];
			$c1c = $c['c1c'];
			
			$c2a = $c['c2a'];
			$c2b = $c['c2b'];
			$c2c = $c['c2c'];
			
			$c3a = $c['c3a'];
			$c3b = $c['c3b'];
			$c3c = $c['c3c'];
		}
		$c1a_b = "";
		$c1b_b = "";
		$c1c_b = "";
		
		$c2a_b = "";
		$c2b_b = "";
		$c2c_b = "";
		
		$c3a_b = "";
		$c3b_b = "";
		$c3c_b = "";
		
		$hc1=0;
		$hc2=0;
		$hc3=0;
		
		$no=0;
		$arr_c1 = array();
		$arr_c2 = array();
		$arr_c3 = array();
		
		$arr_c1_temp = array();
		$arr_c2_temp = array();
		$arr_c3_temp = array();
	?>
	<table cellpadding="5" border="1" cellspacing="0" width="100%">
		<tr align="center">
			<td rowspan="1">Kode</td>
			<td rowspan="1">Nama</td>
			<td rowspan="1">Transaksi</td>
			<td colspan="3">Sangat Laku</td>
			<td colspan="3">Laku</td>
			<td colspan="3">Kurang Laku</td>
			<td rowspan="1" width="30">C1</td>
			<td rowspan="1" width="30">C2</td>
			<td rowspan="1" width="30">C3</td>
		</tr>
		
		<?php 
		foreach($produk->result_array() as $s){ ?>
		<tr>
			<td><?php echo $s['IdPrd']; ?></td>
			<td><?php echo $s['NamaPrd']; ?></td>
			<td><?php echo $s['transaksi']; ?></td>
		
		<td colspan="3"><?php 
			$hc1 = sqrt(pow(($s['transaksi']-$c1a),2));
			echo $hc1;
		?></td>
		<td colspan="3"><?php 
			$hc2 = sqrt(pow(($s['transaksi']-$c2a),2));
			echo $hc2;
		?></td>
		<td colspan="3"><?php 
			$hc3 = sqrt(pow(($s['transaksi']-$c3a),2));
			echo $hc3;
		?></td>
		<?php 
		
		if($hc1<=$hc2)
		{
			if($hc1<=$hc3)
			{
				$arr_c1[$no] = 1;
			}
			else
			{
				$arr_c1[$no] = '0';
			}
		}
		else
		{
			$arr_c1[$no] = '0';
		}
		
		if($hc2<=$hc1)
		{
			if($hc2<=$hc3)
			{
				$arr_c2[$no] = 1;
			}
			else
			{
				$arr_c2[$no] = '0';
			}
		}
		else
		{
			$arr_c2[$no] = '0';
		}
		
		if($hc3<=$hc1)
		{
			if($hc3<=$hc2)
			{
				$arr_c3[$no] = 1;
			}
			else
			{
				$arr_c3[$no] = '0';
			}
		}
		else
		{
			$arr_c3[$no] = '0';
		}
		
		$arr_c1_temp[$no] = $s['transaksi'];
		$arr_c2_temp[$no] = $s['transaksi'];
		$arr_c3_temp[$no] = $s['transaksi'];
		
		$warna1="";
		$warna2="";
		$warna3="";
		?>
		<?php if($arr_c1[$no]==1){$warna1='#F06292';} else{$warna1='#ccc';} ?><td bgcolor="<?php echo $warna1; ?>"><?php echo $arr_c1[$no] ;?></td>
		<?php if($arr_c2[$no]==1){$warna2='#F06292';} else{$warna2='#ccc';} ?><td bgcolor="<?php echo $warna2; ?>"><?php echo $arr_c2[$no] ;?></td>
		<?php if($arr_c3[$no]==1){$warna3='#F06292';} else{$warna3='#ccc';} ?><td bgcolor="<?php echo $warna3; ?>"><?php echo $arr_c3[$no] ;?></td>
		</tr>
		<?php
		$q = "insert into centroid_temp(iterasi,c1,c2,c3) values('".$id."','".$arr_c1[$no]."','".$arr_c2[$no]."','".$arr_c3[$no]."')";
		$this->db->query($q);
		
		$no++; } 
		
		//centroid baru 1.a
		$jum = 0;
		$arr = array();
		for($i=0;$i<count($arr_c1);$i++)
		{
			$arr[$i] = $arr_c1_temp[$i]*$arr_c1[$i];
			if($arr_c1[$i]==1)
			{
				$jum++;
			}
		}
		$c1a_b = array_sum($arr)/$jum;
		
		//centroid baru 1.b
		$jum = 0;
		$arr = array();
		for($i=0;$i<count($arr_c2);$i++)
		{
			$arr[$i] = $arr_c2_temp[$i]*$arr_c1[$i];
			if($arr_c1[$i]==1)
			{
				$jum++;
			}
		}
		$c1b_b = array_sum($arr)/$jum;
		
		//centroid baru 1.c
		$jum = 0;
		$arr = array();
		for($i=0;$i<count($arr_c3);$i++)
		{
			$arr[$i] = $arr_c3_temp[$i]*$arr_c1[$i];
			if($arr_c1[$i]==1)
			{
				$jum++;
			}
		}
		$c1c_b = array_sum($arr)/$jum;
		
		
		
		
		//centroid baru 2.a
		$jum = 0;
		$arr = array();
		for($i=0;$i<count($arr_c1);$i++)
		{
			$arr[$i] = $arr_c1_temp[$i]*$arr_c2[$i];
			if($arr_c2[$i]==1)
			{
				$jum++;
			}
		}
		$c2a_b = array_sum($arr)/$jum;
		
		//centroid baru 2.b
		$jum = 0;
		$arr = array();
		for($i=0;$i<count($arr_c2);$i++)
		{
			$arr[$i] = $arr_c2_temp[$i]*$arr_c2[$i];
			if($arr_c2[$i]==1)
			{
				$jum++;
			}
		}
		$c2b_b = array_sum($arr)/$jum;
		
		//centroid baru 2.c
		$jum = 0;
		$arr = array();
		for($i=0;$i<count($arr_c3);$i++)
		{
			$arr[$i] = $arr_c3_temp[$i]*$arr_c2[$i];
			if($arr_c2[$i]==1)
			{
				$jum++;
			}
		}
		$c2c_b = array_sum($arr)/$jum;
		
		
		
		
		//centroid baru 3.a
		$jum = 0;
		$arr = array();
		for($i=0;$i<count($arr_c1);$i++)
		{
			$arr[$i] = $arr_c1_temp[$i]*$arr_c3[$i];
			if($arr_c3[$i]==1)
			{
				$jum++;
			}
		}
		$c3a_b = array_sum($arr)/$jum;
		
		//centroid baru 3.b
		$jum = 0;
		$arr = array();
		for($i=0;$i<count($arr_c2);$i++)
		{
			$arr[$i] = $arr_c2_temp[$i]*$arr_c3[$i];
			if($arr_c3[$i]==1)
			{
				$jum++;
			}
		}
		$c3b_b = array_sum($arr)/$jum;
		
		//centroid baru 3.c
		$jum = 0;
		$arr = array();
		for($i=0;$i<count($arr_c3);$i++)
		{
			$arr[$i] = $arr_c3_temp[$i]*$arr_c3[$i];
			if($arr_c3[$i]==1)
			{
				$jum++;
			}
		}
		$c3c_b = array_sum($arr)/$jum;
		
		
		$q = "insert into hasil_centroid(c1a,c1b,c1c,c2a,c2b,c2c,c3a,c3b,c3c) values('".$c1a_b."','".$c1b_b."','".$c1c_b."','".$c2a_b."','".$c2b_b."','".$c2c_b."','".$c3a_b."','".
		$c3b_b."','".$c3c_b."')";
		$this->db->query($q);
		
		
		
		?>
	</table>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>