<!DOCTYPE html>
<html lang="en">
<head>
	<title>Page de confirmation de paiement ECE MarketPlace</title>
	<meta charset="utf-8">
	<meta name= "viewport" content= "width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel= "stylesheet"href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
 	<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.j s"> </script>
 	<script src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/j s/bootstrap.min.j s"> </script>
 	<style type="text/css">
 		.navbar {
     		 margin-bottom: 0;
     		 border-radius: 0;
    	}
        #footer{
            background-color: #17A2B8;
            color: white;
        }
    </style>
</head>
<div class="container-fluid">
        <div class="row; text-white bg-info">
            <h1 class="text-center">Page de confirmation de paiement de l'ECE MarketPlace <img src="ecemarketplace.jpg"></h1>
        </div>
        <div class="row; text-white bg-info">
            <p>L'ECE MarketPlace est un site de vente en ligne pour la communauté ECE.<br> Vendez ou bien achetez, des produits de bonne qualité en utilisant nos diverses méthodes : négociation, vente aux enchères ou tout simplement en achat/vente instantané(e).<br> ECE MarketPlace, la plateforme de vente où tout devient possible.</p>
        </div>

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
			echo("ce n'est pas la bonne adresse <br>");
		}
		if ($verifcarte==0){
			echo("ce n'est pas la bonne carte <br>");
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
				echo "Paiement confirmé <br>";
			}
	}
?><br>
<div id="footer">Copyright &copy; ECE MarketPlace 2021<br>
            <p>Vous pouvez-nous contacter :
            <ul>
                <li>Par téléphone au <em>(+33) 07 60 52 04 07</em></li>
                <li>Par email à <a href="mailto:ece.marketplace@gmail.com">ece.marketplace@gmail.com </a></li>
                <li>ou rendez-vous chez nous au <address>37 Quai de Grenelle, 75015 Paris</address></li>
            </ul>
            </p>
        </div>
</body>
</html>