<?php
	$mail = isset($_POST["mail"])? $_POST["mail"] : "";
	$motdepasse = isset($_POST["password"])? $_POST["password"] : "";
	$erreur = "";
	if ($mail == "") 
		{ $erreur .= "Le champ Mail est vide. <br>"; }
	if ($motdepasse == "") 
		{$erreur .= "Le champ Mot de Passe est vide. <br>";}
	if ($erreur == "") 
		{ echo "Formulaire valide.";}
	else { echo "Erreur: <br>" . $erreur; }
	?>