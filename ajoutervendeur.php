<?php
	$nom = isset($_POST["nom"])? $_POST["nom"] : "";
	$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
	$mail = isset($_POST["mail"])? $_POST["mail"] : "";
	$motdepasse = isset($_POST["motdepasse"])? $_POST["motdepasse"] : "";
	$database = "ecemarketplace";
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
	if ($db_found) {
		$sql = "INSERT INTO vendeurs(Nom,Prenom,Mail,Motdepasse) VALUES('$nom','$prenom','$mail','$motdepasse')";
		$result = mysqli_query($db_handle,$sql);

	}
	}else {
 			echo "Database not found";
		}
	mysqli_close($db_handle);
?>