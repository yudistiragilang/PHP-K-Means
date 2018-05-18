

<?php
session_start();
if(empty($_SESSION)){
  header("Location: ../index.php");
}

  include'../config.php';
		
//		$id=$_GET['kode'];
//		$_SESSION['isi'] = $id

		
  				unset($_SESSION['isi']);
				unset($_SESSION['nilai']);
				echo "<script type='text/javascript'>alert('Data berhasil dihapus')</script>";
				echo "<script>document.location.href='brgmasuk.php';</script>";
			
			
		
?>
