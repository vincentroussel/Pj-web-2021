<?php
	$ID = isset($_POST["ID"])? $_POST["ID"] : "";
	$database = "ecemarketplace";
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
	if ($db_found) {
		$sql = "DELETE * FROM objets WHERE ID=$ID";
		$result = mysqli_query($db_handle,$sql);

	}
	}else {
 			echo "Database not found";
		}
	mysqli_close($db_handle);
?>