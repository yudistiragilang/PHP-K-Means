

<meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title>Grafik Stok Buku</title>
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
            categories: ['Produk']
         },
         yAxis: {
            title: {
               text: 'Transaksi'
            }
         },
              series:             
            [
<?php      

include ("../config.php");

   $Data="SELECT * FROM produk";
   $result= $mysqli->query($Data);
   // if ($result->num_rows > 0) {
      while($ambil=$result->fetch_array()){
      	$buku=$ambil['NamaPrd'];
      	$sql_jumlah   = "SELECT * FROM produk WHERE NamaPrd='$buku'";

	$query_jumlah =  $mysqli->query($sql_jumlah);
	while($data=$result->fetch_array()){
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