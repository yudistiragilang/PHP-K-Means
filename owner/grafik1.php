

<meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title>Grafik Terlaris</title>
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="js/highcharts.js" type="text/javascript"></script>
<script src="js/exporting.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Penjualan Terlaris '
         },
         xAxis: {
            categories: ['Buku']
         },
         yAxis: {
            title: {
               text: 'Transaksi'
            }
         },
              series:             
            [
<?php      
// file koneksi php
include ("koneksi.php");
$sql   = "SELECT * FROM produk INNER JOIN centroid_temp ON produk.IdPrd=centroid_temp.IdPrd WHERE c1='1' AND iterasi='1'"; // file untuk mengakses ke tabel database
$query = mysql_query( $sql ) or die(mysql_error());         
while($ambil = mysql_fetch_array($query)){
	$buku=$ambil['NamaPrd'];
	$sql_jumlah   = "SELECT * from produk where NamaPrd='$buku'";        
	$query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
	while( $data = mysql_fetch_array( $query_jumlah ) ){
	   $jumlahx = $data['transaksi'];                 
	  }             
	  
	  ?>
	  {
		  name: '<?php echo $buku; ?>',
		  data: [<?php echo $jumlahx; ?>]
	  },
	  <?php } ?>
]
});
});	
</script>

<!-- fungsi yang di tampilkan dibrowser  -->
<div id="container" style="width: 90%; height: 300px; margin: left"></div>



