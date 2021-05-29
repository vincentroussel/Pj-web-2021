<?php
	session_start();
	$inter=array();
	$interobjet=array();
	$database = "ecemarketplace";
	//connectez-vous dans votre BDD
	//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
 	//si le BDD existe, faire le traitement
	if ($db_found) {
		$sql="SELECT * FROM notifications WHERE 'IDacheteur'=$_SESSION['sessionID']";
		$result = mysqli_query($db_handle, $sql);
  		while ($data = mysqli_fetch_assoc($result)) {
  			$inter=$data;
  		}
  		$_SESSION['ouinonglobal']=$inter['Ouinon'];
  		if ($inter['Ouinon']=='oui'){
  			$sql="SELECT * FROM objets WHERE 'Typevente'=$inter['Typeobjet'] AND 'Categorie'=$inter['Categorievente'] AND ID=$inter['IDdernierobjet']";
  			$result = mysqli_query($db_handle, $sql);
  			while ($data = mysqli_fetch_assoc($result)) {
  				array_push($interobjet, $data);
  			}
  			$sql="SELECT * FROM MAX(IDdernierobjet) WHERE 'Typevente'=$inter['Typeobjet'] AND 'Categorie'=$inter['Categorievente'] AND ID=$inter['IDdernierobjet']";
  			$result = mysqli_query($db_handle, $sql);
  			while ($data = mysqli_fetch_assoc($result)) {
  				$intermax=$data;
  			}
  			$sql="UPDATE IDdernierobjet FROM notifications WHERE 'IDacheteur'=$_SESSION['sessionID']";
  		}
  		$_SESSION['listenotifications']=$interobjet;
	}
	else {
 		echo "Database not found";
	}//end else
	//fermer la connection
	mysqli_close($db_handle);
	header('Location: notifications.php');
?>