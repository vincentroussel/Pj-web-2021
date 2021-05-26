<?php
	session_start();
	header('Location: achat.php');
	$_SESSION['test']=2;
	$inter = array();
	$typeobjet = isset($_POST["typeobjet"])? $_POST["typeobjet"] : "";
	$database = "ecemarketplace";
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
	if ($db_found) {
		$sql="SELECT * FROM objets " ;
		$result = mysqli_query($db_handle, $sql);
		
		while ($data = mysqli_fetch_assoc($result)) {
			array_push($inter, $data);
			var_dump($data);
		}
		echo "inter";
		var_dump($inter);
		$SESSION['listeobjets']=$inter;
		echo "listeobjet";
		var_dump($SESSION['listeobjets']);
	}else {
 			echo "Database not found";
		}
	mysqli_close($db_handle);
	exit();
	/*$database = "ecemarketplace";
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
	if ($db_found) {
		$sql="SELECT * FROM objets WHERE Categorie=$typeobjet";
		$result = mysqli_query($db_handle, $sql);
		while ($data = mysqli_fetch_assoc($result)) {
			echo "Nom: " . $data['Nom'] . '<br>';
			echo "Prix: " . $data['Prix'] . '<br>';
			echo "Defauts: " . $data['Defauts'] . '<br>';
			echo "Qualites: " . $data['Qualites'] . '<br>';
			echo "Ville: " . $data['Ville'] . '<br>';
			echo "Photos: " . $data['Photos'] . '<br>';
			echo "Type de vente: " . $data['Typevente'] . '<br>';
			echo "Categorie: " . $data['Categorie'] . '<br>';
		};
	}else {
 			echo "Database not found";
		}
	mysqli_close($db_handle);
	*/
?>