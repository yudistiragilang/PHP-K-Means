
<?php
session_start();
if($_SESSION){
  header("Location: logout.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="shortcut icon" href="favico.ico" />
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Ecc - Solo</a>
    </div>
  </div>
</nav>
  

  <div class="container">
  	<div class="jumbotron">
  		<img src="./gambar/logo.png" class="img-rounded" alt="Lights" style="width:100%"> 
 	  </div>
  	<div class="row">

      <div class="col-md-4 col-md-offset-4">
        
        <?php
        if(isset($_POST['login'])){
          include("config.php");
          
          $username = $_POST['username'];
          $password = md5($_POST['password']);
          //$level    = $_POST['level'];
          
          $query = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$username' AND password='$password'");
          if(mysqli_num_rows($query) == 0){
            echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
          }else{
            $row = mysqli_fetch_assoc($query);
            
            if($row['level'] == 'admin'){
              $_SESSION['username']=$username;
              $_SESSION['level']='admin';
              header("Location: admin/index.php");
            }else if($row['level'] == 'kasir'){
              $_SESSION['username']=$username;
              $_SESSION['level']='kasir';
              header("Location: ./kasir/index.php");
            }else if($row['level'] == 'pimpinan'){
              $_SESSION['username']=$username;
              $_SESSION['level']='pimpinan';
              header("Location: ./owner/index.php");
            }else{
              echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
            }
          }
        }
        ?>
        
        <form role="form" action="" method="post">
          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus />
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required autofocus />
          </div>
          <div class="form-group">
            <input type="submit" name="login" class="btn btn-primary btn-block" value="MASUK" />
          </div>
          <div class="row">
          		<div class="col-md-12">
          			<p style="color: red; ">
          				* Jika anda belum mempunyai akun silahkan hubungi admin.
          			</p>
          		</div>
          </div>
        </form>
      </div>
  	</div>

	<!-- footer -->
	<div class="page-header">
		<p align="center">.:Yudhistira Gilang Adisetyo:. yudhistiragilang22@gmail.com Copyright 2017</p>
	</div>
	<!-- footer -->
  </div>
</body>
</html>