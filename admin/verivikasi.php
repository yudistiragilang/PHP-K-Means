
<?php
session_start();
if(empty($_SESSION)){
  header("Location: ../index.php");
}

  include'../config.php';

	$id = $_GET['kode'];			
	//$a='terverivikasi';
			
			
			$SQL=$mysqli->query("UPDATE member SET status='terverivikasi' WHERE IdMember='$id'");
			
			
			if($SQL){
				echo"<script>window.alert('DATA BERHASIL DISIMPAN');;window.location='member.php'</script>";
			}else{
				echo"<script>window.alert('DATA GAGAL DISIMPAN');;window.location='member.php'</script>";
			}
		

?>

