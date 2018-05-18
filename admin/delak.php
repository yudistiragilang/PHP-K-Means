<?php
		session_start();
		if(empty($_SESSION)){
		  header("Location: ../index.php");
		}

		  include'../config.php';


			
			$id=$_GET['kode'];
			$SQL = $mysqli->query("DELETE FROM users WHERE id='".$id."'");
			if ($SQL) {
				echo"<script>window.alert('DATA BERHASIL DIHAPUS');window.location='akses.php'</script>";
			}else {
				echo $mysqli->error;
			}
?>