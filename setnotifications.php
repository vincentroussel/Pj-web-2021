<?php
	session_start();
	$ouinonnotif = isset($_POST["ouinonnotif"])? $_POST["ouinonnotif"] : "";
	$typeobjet = isset($_POST["typeobjet"])? $_POST["typeobjet"] : "";
	$categorievente = isset($_POST["categorievente"])? $_POST["categorievente"] : "";
	$database = "ecemarketplace";
	//connectez-vous dans votre BDD
	//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
 	//si le BDD existe, faire le traitement
	if ($db_found) {
		$sql="UPDATE Ouinon FROM notifications SET '$ouinonnotif' WHERE 'IDacheteur'=$_SESSION['sessionID']";
		$result = mysqli_query($db_handle, $sql);
		$sql="UPDATE Typeobjet FROM notifications SET '$typeobjet' WHERE 'IDacheteur'=$_SESSION['sessionID']";
		$result = mysqli_query($db_handle, $sql);
		$sql="UPDATE Categorievente FROM notifications SET '$categorievente' WHERE 'IDacheteur'=$_SESSION['sessionID']";
		$result = mysqli_query($db_handle, $sql);
	}
	else {
 		echo "Database not found";
	}//end else
	//fermer la connection
	mysqli_close($db_handle);
	header('Location: notifications.php');
	exit();
?>