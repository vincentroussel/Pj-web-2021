<?php
	session_start();
	$database = "ecemarketplace";
	//connectez-vous dans votre BDD
	//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
 	//si le BDD existe, faire le traitement
	if ($db_found) {
		$_SESSION['passe'] = 1;
		$IDnego = intval($_SESSION['IDnego']);
		$sql="SELECT prixacheteur,prixvendeur FROM negociation WHERE ID=$IDnego";
		$result = mysqli_query($db_handle, $sql);
		while ($data = mysqli_fetch_assoc($result)) {
			$prixacheteur=$data['prixacheteur'];
			$prixvendeur=$data['prixvendeur'];
		}
		$_SESSION['prixacheteur']=$prixacheteur;
		$_SESSION['prixvendeur']=$prixvendeur;
	}
	else {
 		echo "Database not found";
	}//end else
	//fermer la connection
	mysqli_close($db_handle);
	header('Location: negociationvendeuracheteur.php');
?>