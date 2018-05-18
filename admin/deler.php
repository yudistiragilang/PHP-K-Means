
<?php
			session_start();
			if(empty($_SESSION)){
			  header("Location: ../index.php");
			}

			  include'../config.php';
			
			$id=$_GET['kode'];
			$SQL = $mysqli->query("DELETE FROM member WHERE IdMember='".$id."'");
			if ($SQL) {
				echo"<script>window.alert('DATA BERHASIL DIHAPUS');window.location='member.php'</script>";
			}else {
				echo $mysqli->error;
			}
?>