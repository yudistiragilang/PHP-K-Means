<?php
function login($username, $password, $mysqli){
	// Menggunakan perintah prepared statement untuk menghindari SQL injection
	if($stmt = $mysqli->prepare("SELECT id, password FROM owner WHERE username = ?")){
		$stmt->bind_param('s', $username); // Menyimpan data inputan username ke variabel "$username"
		$stmt->execute(); // Menjalankan perintah query MySQL diatas
		$stmt->store_result();
		$stmt->bind_result($id, $dbpassword); // Menyimpan nilai hasil query ke variabel
		$stmt->fetch();
		
		if($stmt->num_rows == 1){ // Jika user ada/ditemukan
			if($dbpassword == $password){ // Lakukan pengecekan password sesuai atau tidak dengan data di database
				// Jika sama ciptakan SESSION id dan password_login
				$id = preg_replace("/[^0-9]+/", "", $id);
				$_SESSION['id'] = $id;
				$_SESSION['password_login'] = $password;
				// Login berhasil
				return true;
			}else{
				// Password salah				
				return false;	
			}
		}else{

			// User tidak ditemukan
			return false;	
		}
	}
}

function cek_login($mysqli){
	// Cek apakah semua variabel session ada / tidak
	if(isset($_SESSION['id'], $_SESSION['password_login'])){
		$id = $_SESSION['id'];
		$password_login = $_SESSION['password_login'];
		
		if($stmt = $mysqli->prepare("SELECT password FROM owner WHERE id = ? LIMIT 1")){
			$stmt->bind_param('i', $id); // Menyimpan data id user ke variabel "$id"
			$stmt->execute(); // Menjalankan perintah query MySQL diatas
			$stmt->store_result();
			
			if($stmt->num_rows == 1){ // Jika user ada/ditemukan
				$stmt->bind_result($password);
				$stmt->fetch();
				
				if($password_login == $password){ // Jika passwordnya sesuai
					// User melakukan login
					return true;	
				}else{
					// User tidak melakukan login
					return false;	
				}
			}else{
				// User tidak melakukan login
				return false;	
			}
		}else{
			
			// User tidak melakukan login
			return false;	
		}
	}else{
		// User tidak melakukan login
		return false;	
	}
}
?>