<?php
	$nom = isset($_POST["nom"])? $_POST["nom"] : "";
	$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
	$adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
	$mail = isset($_POST["mail"])? $_POST["mail"] : "";
	$motdepasse = isset($_POST["password"])? $_POST["password"] : "";

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
	if ($erreur == "") 
		{ echo "Formulaire valide.";}

	else { echo "Erreur: <br>" . $erreur; }
	?>