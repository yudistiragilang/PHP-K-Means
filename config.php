<?php

	$host="localhost";
	$user="root";
	$pass="";
	$db="projek";
	
	$mysqli = new mysqli($host, $user, $pass, $db);
		
			/* Cek koneksi database */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
?>