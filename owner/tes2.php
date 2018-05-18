
<?php
  $host="localhost";
  $user="root";
  $pass="";
  $db="cluster";
  
  $mysqli = new mysqli($host, $user, $pass, $db);
    
      /* Cek koneksi database */
    if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Halaman Owner</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="shortcut icon" href="../favicon.ico" />
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
        <li class="active"><a href="index.php">Beranda</a></li>
        <li><a href="member.php">Member</a></li>
        <li><a href="produk.php">Produk</a></li>
        <li><a href="sto.php">Laporan STO</a></li>
        <li><a href="Penjualan.php">Laporan Penjualan</a></li>
        <li><a href="../k-means">Cluster Penjualan</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class=""></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  

  <div class="container">
  	<div class="jumbotron">
  		<img src="../gambar/logo.png" class="img-rounded" alt="Lights" style="width:100%">
      
      <div class="row">
        <br>
        <br>

      </div> 
 	  </div>

    <div class="row">
      <div>
        <p><a href="tes2.php" class="btn btn-info">Proses Iterasi Selanjutnya</a><br><br></p>
      </div>
      
    </div>

    <div class="row" align="center">
      <?php
        $c1a = "";
        $c2a = "";
        $c3a = "";
        
        
        $Data="SELECT * FROM hasil_centroid ";
        $result= $mysqli->query($Data);

        if ($result->num_rows > 0) {
        while($c=$result->fetch_array()){
          $c1a = $c['c1a'];
          $c2a = $c['c2a'];      
          $c3a = $c['c3a'];
         }
       }
        $c1a_b = "";
        $c2a_b = "";
        $c3a_b = "";
    
    
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
    $Data="SELECT * FROM produk ";
        $result= $mysqli->query($Data);

        if ($result->num_rows > 0) {
        while($p=$result->fetch_array()){
   ?>
    <tr>
      <td><?php echo $p['IdPrd'] ?></td>
      <td><?php echo $p['NamaPrd'] ?></td>
      <td><?php echo $p['transaksi'] ?></td>
    
    <td colspan="3"><?php 
      $hc1 = sqrt(pow(($p['transaksi']-$c1a),2));
      echo $hc1;
    ?></td>
    <td colspan="3"><?php 
      $hc2 = sqrt(pow(($p['transaksi']-$c2a),2));
      echo $hc2;
    ?></td>
    <td colspan="3"><?php 
      $hc3 = sqrt(pow(($p['transaksi']-$c3a),2));
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
    
    $arr_c1_temp[$no] = $p['transaksi'];
    $arr_c2_temp[$no] = $p['transaksi'];
    $arr_c3_temp[$no] = $p['transaksi'];
    
    $warna1="";
    $warna2="";
    $warna3="";
    ?>
    <?php if($arr_c1[$no]==1){$warna1='#F06292';} else{$warna1='#ccc';} ?>
    <td bgcolor="<?php echo $warna1; ?>"><?php echo $arr_c1[$no] ;?></td>
    <?php if($arr_c2[$no]==1){$warna2='#F06292';} else{$warna2='#ccc';} ?>
    <td bgcolor="<?php echo $warna2; ?>"><?php echo $arr_c2[$no] ;?></td>
    <?php if($arr_c3[$no]==1){$warna3='#F06292';} else{$warna3='#ccc';} ?>
    <td bgcolor="<?php echo $warna3; ?>"><?php echo $arr_c3[$no] ;?></td>
    </tr>

    <?php
    $q = "insert into centroid_temp(iterasi,c1,c2,c3) values('".$id."','".$arr_c1[$no]."','".$arr_c2[$no]."','".$arr_c3[$no]."')";
    $sql=$mysqli->query($q);
    
    $no++; 
    }}
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

    
    $q = "insert into hasil_centroid(c1a, c2a, c3a) values('".$c1a_b."','".$c2a_b."','".$c3a_b."')";
    $sql=$mysqli->query($q);
    
    
    
    ?>
  </table>
	  </div>

  </div>
</body>
</html>