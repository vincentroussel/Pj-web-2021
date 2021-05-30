<?php
	$IDobjet = isset($_POST["IDobjet"])? $_POST["IDobjet"] : "";
	$database = "ecemarketplace";
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
	if ($db_found) {
		$sql="DELETE FROM objets WHERE ID=$IDobjet";
		$result = mysqli_query($db_handle, $sql);
		while ($data = mysqli_fetch_assoc($result)) {

		}
	}
	}else {
 		echo "Database not found";
	}
	mysqli_close($db_handle);
	header('Location: consulterobjetsadmin.php');
?>