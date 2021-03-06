<?php
    session_start();
    $votreoffre = isset($_POST["votreoffre"])? $_POST["votreoffre"] : "";
    $database = "ecemarketplace";
    //connectez-vous dans votre BDD
    //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    //si le BDD existe, faire le traitement
    if ($db_found) {
        $IDnego = intval($_SESSION['IDnego']); 
        $IDobjet = intval($_SESSION['IDobjet']);
        $ID = intval($_SESSION['sessionID']);
        $sql="UPDATE negociation SET prixvendeur =$votreoffre WHERE ID=$IDnego";
        $result = mysqli_query($db_handle, $sql);
        $sql="SELECT * FROM negociation WHERE ID=$IDnego";
        $result = mysqli_query($db_handle, $sql);
        while ($data = mysqli_fetch_assoc($result)) {
            $offreacheteur=intval($data['prixacheteur']);
        }
        if ($offreacheteur==$votreoffre){
            $sql="UPDATE objets SET IDvendu =1 WHERE ID=$IDobjet";
            $result = mysqli_query($db_handle, $sql);
            //envoi vers un message de confirmation
            $message='La negociation est terminee, vous avez vendu cet arcticle';
        }
        else{
            $sql="SELECT * FROM negociation WHERE IDobjets=$IDobjet";
            $result = mysqli_query($db_handle, $sql);
            while ($data = mysqli_fetch_assoc($result)) {
                $inter=intval($data['nbetape']);
            }
            if($inter==10){
                $sql="DELETE FROM panier WHERE ID = $ID AND IDobjets=$IDobjet";
                $result = mysqli_query($db_handle, $sql);
                $sql="DELETE FROM negociation WHERE ID = $IDnego";
                $result = mysqli_query($db_handle, $sql);
                //renvoi vers un message informant que la négo est finie
                $message='La negociation est terminee, vous avez dépassé le nombre max de negociations';
            }
            else{
                $inter=$inter+1;
                $sql="UPDATE negociation SET nbetape=$inter WHERE ID=$IDnego";
                $result = mysqli_query($db_handle, $sql);
                //renvoi vers une page disant que la negociation continue
                $message='La negociation continue';
            }
        }
    }
    else {
        echo "Database not found";
    }//end else
    //fermer la connection
    mysqli_close($db_handle);
?>
<!DOCTYPE html>
<html>
<head>
    <title>negociation</title>
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
                <li class="active"><a href="pagevendeur.html">Accueil</a></li>
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
    <?php echo $message; ?>
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
