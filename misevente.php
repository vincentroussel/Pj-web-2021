<?php
//identifier le nom de base de données
echo "<meta charset=\"utf-8\">";
$database = "ecemarketplace";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

//saisir les données de notre formulaire
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prix = isset($_POST["prix"])? $_POST["prix"] : "";
$qualites = isset($_POST["qualites"])? $_POST["qualites"] : "";
$defauts = isset($_POST["defauts"])? $_POST["defauts"] : "";
$ville= isset($_POST["ville"])? $_POST["ville"] : "";
$categorievente= isset($_POST["categorievente"])? $_POST["categorievente"] : "";
$categorieobjet= isset($_POST["categorieobjet"])? $_POST["categorieobjet"] : "";

 //si le BDD existe, faire le traitement
if ($db_found) {
	//on va chercher le produit dans la BDD
	$sql = "SELECT * FROM objets WHERE Nom LIKE '%$nom'";
	$result = mysqli_query($db_handle, $sql);
	//on regarde si il y'a des résultats
	if (mysqli_num_rows($result) != 0) {
		//Un article du même nom existe déjà
		echo "Un article du même nom existe déjà. <br>";
	} else{
		//on ajoute l'article dans la BDD
		$sql = "INSERT INTO objets(Nom, Prix, Defauts, Qualites, Typevente, Categorie) VALUES('$nom', $prix ,'$defauts','$qualites','$categorievente','$categorieobjet')";
		$result = mysqli_query($db_handle,$sql);
		echo "Ajout confirmé <br>";
		//on affiche l'objet ajouté
		$sql = "SELECT * FROM objets WHERE Nom LIKE '%$nom'";
		$result = mysqli_query($db_handle, $sql);
		echo "<h4>Informations sur le nouveau objet ajouté:</h4>";
		echo "<table border='1'>";
		echo "<tr>";
		echo "<th>" . "ID" . "</th>";
		echo "<th>" . "Nom" . "</th>";
		echo "<th>" . "Prix" . "</th>";
		echo "<th>" . "Defauts" . "</th>";
		echo "<th>" . "Qualites" . "</th>";
		echo "<th>" . "Type de vente" . "</th>";
		echo "<th>" . "Categorie" . "</th>";
		echo "</tr>";
		while ($data = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<th>" . $data['ID'] . "</th>";
			echo "<th>" . $data['Nom'] . "</th>";
			echo "<th>" . $data['Prix'] . "</th>";
			echo "<th>" . $data['Defauts'] . "</th>";
			echo "<th>" . $data['Qualites'] . "</th>";
			echo "<th>" . $data['Typevente'] . "</th>";
			echo "<th>" . $data['Categorie'] . "</th>";
			echo "</tr>";
		}
		$sql = "SELECT ID FROM objets WHERE Nom LIKE '%$nom'";
		$result = mysqli_query($db_handle, $sql);
		while ($data = mysqli_fetch_assoc($result)){
			$ID = $data['ID'];
		}
		$sql = "UPDATE objets SET IDimages = $ID WHERE ID = $ID;";
		$result = mysqli_query($db_handle,$sql);
	}
}//end if
//si le BDD n'existe pas
else {
 echo "Database not found";
}//end else
//fermer la connection
mysqli_close($db_handle);
?>