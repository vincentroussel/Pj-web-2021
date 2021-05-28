<?php
	session_start();
	$inter=array();
	$nom = isset($_POST["nom"])? $_POST["nom"] : "";
	$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
	$adresse1 = isset($_POST["adresse1"])? $_POST["adresse1"] : "";
	$adresse1 = isset($_POST["adresse2"])? $_POST["adresse2"] : "";
	$ville = isset($_POST["ville"])? $_POST["ville"] : "";
	$postale = isset($_POST["postale"])? $_POST["postale"] : "";
	$pays = isset($_POST["pays"])? $_POST["pays"] : "";
	$telephone = isset($_POST["telephone"])? $_POST["telephone"] : "";
	$creditCard = isset($_POST["creditCard"])? $_POST["creditCard"] : "";
	$numcarte = isset($_POST["numcarte"])? $_POST["numcarte"] : "";
	$nomcarte = isset($_POST["nomcarte"])? $_POST["nomcarte"] : "";
	$date = isset($_POST["Date"])? $_POST["Date"] : "";
	$cryptogramme = isset($_POST["cryptogramme"])? $_POST["cryptogramme"] : "";
	$verifadresse=0;
	$verifcarte=0;

	$database = "ecemarketplace";
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
	if ($db_found) {
		$sql= "SELECT * FROM adressedelivraison WHERE 'IDacheteurs'=$_SESSION['sessionID']";
		$result = mysqli_query($db_handle,$sql);
		while ($data = mysqli_fetch_assoc($result)){
			if (($data['Nom'] == $nom) && ($data['Prenom'] == $prenom)&& ($data['Adresse1'] == $adresse1)&& ($data['Adresse2'] == $adresse2)&& ($data['Ville'] == $ville)&& ($data['Postale'] == $postale)&& ($data['Pays'] == $pays)&& ($data['Telephone'] == $telephone)) {
				$verifadresse = 1;
			}
		}
		$verif=0;
		$sql="SELECT * FROM infobancaire WHERE 'Numcarte'='$numcarte'";
		$result = mysqli_query($db_handle,$sql);
		while ($data = mysqli_fetch_assoc($result)){
			if(($data['Typecarte'] == $creditCard) &&($data['Nom'] == $nomcarte) && ($data['Date'] == $date)&& ($data['Cryptogramme'] == $cryptogramme)){
				$verifcarte=1;
			}
		}
		if ($verifadresse==0){
			echo("ce n'est pas la bonne adresse");
		}
		if ($verifcarte==0){
			echo("ce n'est pas la bonne carte");
		}
		if (($verifadresse==1)&&($verifcarte==1)){
			$sql="SELECT IDobjets FROM panier WHERE 'IDacheteurs'=$_SESSION['sessionID'] ";
			$result = mysqli_query($db_handle,$sql);
			while ($data = mysqli_fetch_assoc($result)){
				array_push($inter, $data);
			}
			$lenghth=count($inter);
			for ($i=0;$i<$length;$i++){
				$sql="UPDATE IDvendu FROM objets SET '1' WHERE 'ID'=$inter[$i]";
				$result = mysqli_query($db_handle,$sql);
			}
	}
?>