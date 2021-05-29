<!DOCTYPE html>
<html>
<head>
	<title>Confirmation inscription en tant qu'acheteur</title>
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
<body>
	<div class="container-fluid">
		<div class="row; text-white bg-info">
			<h1 class="text-center">Bienvenue sur l'espace de confirmation d'inscription acheteur <img src="ecemarketplace.jpg"></h1>
		</div>
		<div class="row; text-white bg-info">
			<p>L'ECE MarketPlace est un site de vente en ligne pour la communauté ECE.<br> Vendez ou bien achetez, des produits de bonne qualité en utilisant nos diverses méthodes : négociation, vente aux enchères ou tout simplement en achat/vente instantané(e).<br> ECE MarketPlace, la plateforme de vente où tout devient possible.</p>
		</div>
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
		{ echo "Formulaire valide.<br>";}

	else { echo "Erreur: <br>" . $erreur; }
	mysqli_close($db_handle);
	?>
	<br>
	Retournez à la page de<a href="votrecompte.html"> connexion.</a>
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