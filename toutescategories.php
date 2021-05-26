<?php
	$typeobjet = isset($_POST["typeobjet"])? $_POST["typeobjet"] : "";
	$database = "ecemarketplace";
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
?>