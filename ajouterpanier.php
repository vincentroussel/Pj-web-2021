<?php
session_start();
	$IDobjet = isset($_POST["IDobjet"])? $_POST["IDobjet"] : "";
	$typevente = isset($_POST["typevente"])? $_POST["typevente"] : "";
	$valide=1;
	$database = "ecemarketplace";
	$ID = $_SESSION['sessionID'];
	var_dump($ID);
	//var_dump($typeobjet);
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
	if ($db_found) {
		$sql="SELECT IDobjets FROM panier WHERE ID= $ID";
		$result = mysqli_query($db_handle, $sql);
		while ($data = mysqli_fetch_assoc($result)) {
			if($data['IDobjets']==$IDobjet){
				$valide=0;
			}
		}
		var_dump($valide);
		if ($valide==1){
			$sql="INSERT INTO panier (IDobjets, ID) VALUES($IDobjet,$ID)";
			$result = mysqli_query($db_handle, $sql);
			if ($typevente=='nego'){
				$sql="SELECT IDvendeurs FROM objets WHERE IDobjets=$IDobjet";
				$result = mysqli_query($db_handle, $sql);
				while ($data = mysqli_fetch_assoc($result)) {
					$idvendeur=$data['IDvendeurs'];
				}
				$sql="INSERT INTO negociation (IDobjets,prixacheteur,prixvendeur, IDvendeurs, IDacheteurs, nbetapes) VALUES($IDobjet, -1, -1, $idvendeur, $ID, 0)";
				$result = mysqli_query($db_handle, $sql);
			}
		}
	}
	else {
 			echo "Database not found";
		}
	mysqli_close($db_handle);
	header('Location: achat.php');
	exit();
?>