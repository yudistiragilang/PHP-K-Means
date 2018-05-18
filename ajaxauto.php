<?php
include 'config.php';

	$sql = "SELECT Nama FROM member
			WHERE Nama LIKE '%".$_GET['query']."%'
			LIMIT 10"; 
	$result    = mysqli_query($mysqli,$sql);
	
	$json = [];
	while($row = $result->fetch_assoc()){
	     $json[] = $row['Nama'];
	}

	echo json_encode($json);

?>