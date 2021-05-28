<?php
	session_start();
	$inter = array();
	§id=$_SESSION['sessionID'];
	$database = "ecemarketplace";
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
	if ($db_found) {
		$sql="SELECT * FROM objets WHERE IDvendeur =$id " ;
		$result = mysqli_query($db_handle, $sql);
		
		while ($data = mysqli_fetch_assoc($result)) {
			array_push($inter, $data);
		}
		$_SESSION['listeobjetsvendeur']=$inter;
	}else {
 			echo "Database not found";
		}
	mysqli_close($db_handle);
	header('Location: consulterobjets.php');
	exit();
?>