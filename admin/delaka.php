<?php
	include('../config.php');
	include('../fungsia.php');

	session_start();

	if(cek_login($mysqli) == false){ // Jika user tidak login
		header('location: ../logina.php'); // Alihkan ke halaman login (login.php)
		exit();	
		}
			
			$id=$_GET['kode'];
			$SQL = $mysqli->query("DELETE FROM user WHERE id='".$id."'");
			if ($SQL) {
				echo"<script>window.alert('DATA BERHASIL DIHAPUS');window.location='aksesa.php'</script>";
			}else {
				echo $mysqli->error;
			}
?>