<?php
session_start();
	$IDobjet = isset($_POST["IDobjet"])? $_POST["IDobjet"] : "";
	$typevente = isset($_POST["typevente"])? $_POST["typevente"] : "";
	$valide=1;
	$database = "ecemarketplace";
	$ID = $_SESSION['sessionID'];
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
		if ($valide==1){
			$sql="INSERT INTO panier (IDobjets, ID) VALUES($IDobjet,$ID)";
			$result = mysqli_query($db_handle, $sql);
			if ($typevente=='nego '){
				$sql="SELECT IDvendeur, Prix FROM objets WHERE ID=$IDobjet";
				$result = mysqli_query($db_handle, $sql);
				while ($data = mysqli_fetch_assoc($result)) {
					$idvendeur=$data['IDvendeur'];
					$prix =$data['Prix'];
				}
				$sql="INSERT INTO negociation (IDobjets,prixacheteur,prixvendeur, IDvendeurs, IDacheteurs, nbetape) VALUES($IDobjet, 0, $prix, $idvendeur, $ID, 0)";
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