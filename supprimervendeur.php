<?php
	$mail = isset($_POST["mail"])? $_POST["mail"] : "";
	$nom = isset($_POST["nom"])? $_POST["nom"] : "";
	$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
	$database = "ecemarketplace";
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
	if ($db_found) {
		$sql = "DELETE FROM vendeurs WHERE Mail='$mail' AND Nom='$nom' AND Prenom='$prenom'";
		var_dump($sql);
		$result = mysqli_query($db_handle,$sql);
	}else {
 			echo "Database not found";
		}
	mysqli_close($db_handle);
?>