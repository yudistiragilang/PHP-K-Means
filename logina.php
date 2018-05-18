<?php
include('config.php');
include('fungsia.php');

session_start(); // Menciptakan session

if(cek_login($mysqli) == true){
	header('location: admin/index.php');
	exit();	
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['username']) and isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(login($username, $password, $mysqli) == true){
			echo"<script>window.alert('Login Berhasil !!');;window.location='admin/index.php'</script>";
			// Berhasil login
			// header('location: admin/index.php');
			exit();
		}else{
			echo"<script>window.alert('PASSWORD SALAH !!');;window.location='logina.php'</script>";
			// Gagal login
			//header('location: login.php');
			exit();	
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<link rel="stylesheet" href="js/jquery-ui/jquery-ui.css">
</head>

<body>
    <form action="" method="post" class="form-login">
    <h2 align="center">Form Login Admin</h2>
	<p align="center">
    	<input type="text" name="username" autofocus placeholder="Username" class="normal-input" required/>
	</p>
    <p align="center">
    	<input type="password" name="password" placeholder="Password" class="normal-input" required/>
	</p>
	<p align="center">
    <input type="submit" value="Login" class="tombol" name="login"  />
    </p>
    <p align="center">
    <a href="logink.php" class="btn btn-info">Login Kasir</a>
    <a href="logino.php" class="btn btn-warning">Login Owner</a>
    </p>
    </form>
</body>
</html>