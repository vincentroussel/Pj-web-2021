<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bienvenue sur la page négociations vendeur/acheteur de l'ECE MarketPlace</title>
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
            <h1 class="text-center">Bienvenue sur la page des négociations vendeur/acheteur de l'ECE MarketPlace <img src="ecemarketplace.jpg"></h1>
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
                <li><a href="pagevendeur.html">Accueil</a></li>
                <li><a href="misevente.html">Vendre un bien</a></li>
                <li><a href="consulterobjets.php">Mon espace de vente</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right navbar-expand">
                <li class="active"><a href="negociationvendeuracheteur.php">Négociations</a></li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="votrecompte.html" id="navbarDropdownMenuLink" data-toggle="dropdown"aria-haspopup="true"aria-expanded="false">Votre Compte</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="profilvendeur.php">Mon Profil</a>
                    <a class="dropdown-item" href="votrecompte.html">Déconnexion</a>
                  </div>
                </li>
              </ul>
          </div>
        </div>
    </nav>
        <h2>Négociations en cours</h2>
    <form action="affichernegovendeuracheteur.php" method="POST">
        <tr>
                <td colspan="2" align="center">
                <input type="submit" value="Afficher ma négociation" >
            </td>
            </tr>
    </form><br>
    <?php
    if ($_SESSION['passe'] == 1) {
        $_SESSION['passe'] =0;
    ?>
    <table>
            <tr>
                <td>Votre dernière offre</td>
                <?php $prixvendeur = $_SESSION['prixvendeur']?>
                <td><?php echo $prixvendeur?> euros;</td>
            </tr>
            <tr>
                <td>Dernière offre de l'acheteur</td>
                <?php $prixacheteur = $_SESSION['prixacheteur']?>
                <td><?php echo $prixacheteur?> euros;</td>
            </tr>
        </table>
    <?php }
        ?>
    <form action="traitementnegociationvendeuracheteur.php" method="POST">
        <table>
            <tr>
                <td>Votre offre:</td>
                <td><input type="number" name="votreoffre"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                <input type="submit" value="Négocier" >
            </td>
            </tr>
        </table>
        
    </form><br>
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
