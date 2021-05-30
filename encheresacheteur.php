<?php
	session_start();
	date_default_timezone_set('France/Paris');
	$enchereproposee = isset($_POST["enchereproposee"])? $_POST["enchereproposee"] : "";

	$database = "ecemarketplace";
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
	if ($db_found) {
		$date = date('m/d/Y h:i:s a', time());
		$sql="SELECT Datevente FROM encheres WHERE 'IDobjets'=$_SESSION['IDobjet']";
		$result = mysqli_query($db_handle, $sql);
		while ($data = mysqli_fetch_assoc($result)) {
			$datefin=$data;
		}
		if ($date>$datefin){
			//on arrete tout
			$sql="SELECT IDacheteurs, Prix2 FROM encheres WHERE 'IDobjets'=$_SESSION['IDobjet']";
			$result = mysqli_query($db_handle, $sql);
			while ($data = mysqli_fetch_assoc($result)) {
				$check=$data['IDacheteur'];
				$prixpaye=$data['Prix2'];
			}
			$prixpaye=$prixpaye+1;
			if($check==$_SESSION('sessionID')){

				$message='enchere terminee. Vous avez gagne. Vous avez achete votre objet a '.$prixpaye.' euros';
			}
			else{
				$message='enchere terminee. vous avez perdu';
				// faudrait envoyer un mail au gars qui a gagné pour lui dire qu'il a gagné
			}
			$sql="UPDATE IDvendu FROM encheres SET'1' WHERE 'IDobjets'=$_SESSION['IDobjet']";
		}
		else{
			$sql="SELECT Prix1,Prix2 FROM encheres WHERE 'IDobjets'=$_SESSION['IDobjet']";
			$result = mysqli_query($db_handle, $sql);
			while ($data = mysqli_fetch_assoc($result)) {
				$prix1=$data['Prix1'];
				$prix2=$data['Prix2'];
			}
			if ($enchereproposee>$Prix1){
				$sql="UPDATE Prix2 FROM encheres SET'$prix1' WHERE 'IDobjets'=$_SESSION['IDobjet']";
				$result = mysqli_query($db_handle, $sql);
				$sql="UPDATE Prix1 FROM encheres SET'$enchereproposee' WHERE 'IDobjets'=$_SESSION['IDobjet']";
				$result = mysqli_query($db_handle, $sql);
				$sql="UPDATE IDacheteurs FROM encheres SET'$_SESSION['sessionID']' WHERE 'IDobjets'=$_SESSION['IDobjet']";
				$result = mysqli_query($db_handle, $sql);
			}
			else{
				if ($enchereproposee>$Prix1){
					$sql="UPDATE Prix2 FROM encheres SET'$enchereproposee' WHERE 'IDobjets'=$_SESSION['IDobjet']";
					$result = mysqli_query($db_handle, $sql);
				}
			}
			$message='Votre enchère a bien étée prise en compte';
		}
	}else {
 			echo "Database not found";
		}
	mysqli_close($db_handle);
?>
<!DOCTYPE html>
<html>
<head>
	<title>enchere acheteur</title>
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
            <h1 class="text-center">Bienvenue sur la page d'enchères acheteur de l'ECE MarketPlace <img src="ecemarketplace.jpg"></h1>
        </div>
        <div class="row; text-white bg-info">
            <p>L'ECE MarketPlace est un site de vente en ligne pour la communauté ECE.<br> Vendez ou bien achetez, des produits de bonne qualité en utilisant nos diverses méthodes : négociation, vente aux enchères ou tout simplement en achat/vente instantané(e).<br> ECE MarketPlace, la plateforme de vente où tout devient possible.</p>
        </div>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-expand">
                        <li><a href="accueilacheteur.html">Accueil</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"aria-haspopup="true"aria-expanded="false">Tout Parcourir</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="achatimmediat.html">Achat immédiat</a>
                                <a class="dropdown-item" href="meilleuroffre.html">Meilleure Offre</a>
                                <a class="dropdown-item" href="transactionacheteurvendeur.html">Transaction Acheteur/Vendeur</a>
                            </div>
                        </li>
                        <li><a href="notifications.php">Notifications</a></li>
                        
                    </ul>
                    <ul class="nav navbar-nav navbar-right navbar-expand">
                        <li class="active"><a href="encheres.html">Enchères</a></li>
                        <li><a href="panier.php"><span class="glyphicon glyphicon-log-in"></span> Panier <img src="panier.jpg" width="20" height="20"></a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="votrecompte.html" id="navbarDropdownMenuLink" data-toggle="dropdown"aria-haspopup="true"aria-expanded="false">Votre Compte</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="monprofil.html">Mon Profil</a>
                                <a class="dropdown-item" href="votrecompte.html">Déconnexion</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <br>
        <?php echo"$message"; ?>
        <br>
        <br>
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