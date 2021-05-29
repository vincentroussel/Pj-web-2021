<?php
	session_start(); //Lyès est content
	$nom = isset($_POST["nom"])? $_POST["nom"] : "";
	$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
	$adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
	$mail = isset($_POST["mail"])? $_POST["mail"] : "";
	$motdepasse = isset($_POST["password"])? $_POST["password"] : "";
	$numcarte = isset($_POST["numcarte"])? $_POST["numcarte"] : "";
	$database = "ecemarketplace";
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
	$numcarteint = intval($numcarte, 10);
	$IDacheteurs;
	if ($db_found) {
		$sql="SELECT Mail FROM acheteurs";
		$result = mysqli_query($db_handle, $sql);
		$binaire = 1;
		while ($data = mysqli_fetch_assoc($result)) {
			$datastr = implode("' '",$data);
			if ($mail == $datastr) {
				$binaire=0;
			}
		} 
		if ($binaire==1) {
			$sql="INSERT INTO acheteurs(Nom,Prenom,Adresse,Mail,Motdepasse,Numcarte) VALUES ('$nom','$prenom','$adresse','$mail','$motdepasse','$numcarte')";
			$result = mysqli_query($db_handle, $sql);
			$sql="SELECT ID FROM acheteurs WHERE Mail = '$mail'";
			$result = mysqli_query($db_handle, $sql);
			var_dump($result);
			while ($data = mysqli_fetch_assoc($result)){
				$IDacheteurs = $data['ID'];
			}
			$sql="INSERT INTO notifications(Ouinon,IDacheteurs,IDdernierobjet) VALUES('non',$IDacheteurs,1)";
			$result = mysqli_query($db_handle, $sql);
			echo "Inscription confirmée.<br>";
		} else{
			echo "Ce mail existe déjà.";
		}
	}
	else {
 			echo "Database not found";
		}
	$erreur = "";
	if ($nom == "") 
		{ $erreur .= "Le champ Nom est vide. <br>"; } 
	if ($prenom == "") 
		{ $erreur .= "Le champ Prénom est vide. <br>"; }
	if ($adresse == "") 
		{ $erreur .= "Le champ Adresse est vide. <br>"; }
	if ($mail == "") 
		{ $erreur .= "Le champ Mail est vide. <br>"; }
	if ($motdepasse == "") 
		{$erreur .= "Le champ Mot de Passe est vide. <br>";}
	if ($erreur == "" && $binaire == 1) 
		{ echo "Formulaire valide.";}

	else { echo "Erreur: <br>" . $erreur; }
	mysqli_close($db_handle);
	?>