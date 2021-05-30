<?php
session_start();
	$IDobjet = isset($_POST["IDobjet"])? $_POST["IDobjet"] : "";
	$typevente = isset($_POST["typevente"])? $_POST["typevente"] : "";
	$valide=1;
	$database = "ecemarketplace";
	//var_dump($typeobjet);
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
	if ($db_found) {
		$sql="SELECT IDobjets FROM panier WHERE IDacheteurs=$_SESSION['sessionID'] ";
		$result = mysqli_query($db_handle, $sql);
		while ($data = mysqli_fetch_assoc($result)) {
			if($data['IDobjets']==$IDobjet){
				$valide=0;
			}
		}
		if ($valide==1){
			$sql="INSERT INTO panier (IDobjets, IDacheteurs) VALUES($IDobjets,$_SESSION['sessionID'])";
			$result = mysqli_query($db_handle, $sql);
			if ($typevente=='nego'){
				$sql="SELECT IDvendeurs FROM objets WHERE IDobjets=$IDobjet";
				$result = mysqli_query($db_handle, $sql);
				while ($data = mysqli_fetch_assoc($result)) {
					$idvendeur=$data['IDvendeurs'];
				}
				$sql="INSERT INTO negociation (IDobjets,prixacheteur,prixvendeur, IDvendeurs, IDacheteurs, nbetapes) VALUES($IDobjet, -1, -1 $idvendeur, $_SESSION['sessionID'], 0)";
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