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
    $_SESSION['passe'] = 1;
    $ID = intval($_SESSION['sessionID']);
		$sql="SELECT * FROM notifications WHERE IDacheteurs=$ID";
		$result = mysqli_query($db_handle, $sql);
  		while ($data = mysqli_fetch_assoc($result)) {
        //var_dump($data);
  			$inter = $data;
        //var_dump($inter);
  		}
  		$_SESSION['ouinonglobal']=$inter['Ouinon'];
  		if ($inter['Ouinon']=='oui'){
        $IDdernierobjet = intval($_SESSION['IDnego']);
        $Typevente = $inter['Categorievente'];
        $Categorievente = $inter['Typeobjet'];
  			$sql="SELECT * FROM objets WHERE Typevente= '$Typevente' AND Categorie= '$Categorievente'";
        //var_dump($sql);
  			$result = mysqli_query($db_handle, $sql);
        //var_dump($result);
  			while ($data = mysqli_fetch_assoc($result)) {
  				array_push($interobjet, $data);
  			}
  			$sql="SELECT MAX(ID) FROM objets WHERE Typevente= '$Typevente' AND Categorie='$Categorievente' ";
        //var_dump($sql);
  			$result = mysqli_query($db_handle, $sql);
        //var_dump($result);
  			while ($data = mysqli_fetch_assoc($result)) {
          //var_dump($data);
  				$intermax=intval($data['MAX(ID)']);
  			}
  			$sql="UPDATE notifications SET IDdernierobjet = $intermax  WHERE IDacheteur=$ID";
  		}
  		$_SESSION['listenotifications']=$interobjet;
	}
	else {
 		echo "Database not found";
	}//end else
	//fermer la connection
	mysqli_close($db_handle);
	header('Location: notifications.php');
  exit();
?>