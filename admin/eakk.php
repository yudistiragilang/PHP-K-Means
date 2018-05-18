<?php

		include('../config.php');
		include('../fungsia.php');

		session_start();

		if(cek_login($mysqli) == false){ // Jika user tidak login
		header('location: ../logina.php'); // Alihkan ke halaman login (index.php)
		exit();	
}
				
			$id = $_GET['kode'];
			$SQL_DATA = $mysqli->query("SELECT * FROM kasir WHERE id='$id'");
			$haka = $SQL_DATA->fetch_array();				
				
?>

<html>
	<head>
	<title>Ubah Data</title>
	<style>
	input[type=text], select {
			width : 100%;
			padding : 8px 12 px;
			margin : 5px 0;
				margin-left:10px;
			display : inline-block;
			border : 1px solid #ccc;
			border-radius : 4px ;
			box-sizing: border-box;
		}
		input[type=submit] {
			width : 100%;
			bacground-color: #4CAF50;
			color : #FFFFFF;
				font-size:15px;
			padding : 14px 20px;
			margin : 8px 0 ;
			border : none ;
			border-radius : 4px ;
			corsur : pointer;
		}
		input[type=submit]:hover {
			background-color : #45A049;
		}
		body {
			background-color : #E6E6FA ;
		}
		h2 {
			text-align : center;
			color : #4CAF50;
			text-shadow : 2px 2px 5px white;
		}
	</style>
	</head>
	
	<body>
	<?php

		if(isset($_POST["ubah"])) {

			$a=$_POST["id"];
			$b=$_POST["username"];
			$c=$_POST["password"];
			$d=$_POST["nama"];
			$e=$_POST["alamat"];
			$f=$_POST["telepon"];

			$sql=("UPDATE kasir SET username='$b', password='$c', NamaKasir='$d', AlamatKasir='$e', TlpKasir='$f' WHERE id='$a'");
			$hasil=mysqli_query($mysqli,$sql);

			if($hasil) {
				echo"<script>window.alert('DATA BERHASIL DIUBAH');;window.location='aksesk.php'</script>";
			} else {
				echo $mysqli->error;
			}			
		}
			echo"
		<h2>Edit Data Haka Kasir</h2>
		<form action='' method='POST'>
		<table align='center'>
			<tr hidden='hidden'>
				<td>ID</td>
				<td>:</td>
				<td><input type='text' name='id' value='".$haka['id']."'></td>
			</tr>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input type='text' name='username' value='".$haka['username']."'></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type='text' name='password' value='".$haka['password']."'></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type='text' name='nama' value='".$haka['NamaKasir']."'></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input type='text' name='alamat' value='".$haka['AlamatKasir']."'></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td>:</td>
				<td><input type='text' name='telepon' value='".$haka['TlpKasir']."'></td>
			</tr>
			<tr>
				<td colspan='3'><input type='submit' name='ubah' value='UBAH'></td>
			</tr>
		</table>
		</form>";
		?>
	</body>
</html>