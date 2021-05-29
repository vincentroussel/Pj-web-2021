<!DOCTYPE html>
<html>
<head>
	<title>mise en vente</title>
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
    .tablo{
    	text-align: center;
    }
  </style>
</head>
<body>
	<div class="container-fluid">
    <div class="row; text-white bg-info">
      <h1 class="text-center">Bienvenue sur votre espace de mise en vente de l'ECE MarketPlace <img src="ecemarketplace.jpg"></h1>
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
                <li><a href="#">Evaluer mon bien</a></li>
                <li  class="active"><a href="misevente.html">Vendre un bien</a></li>
                <li><a href="espacevente.html">Mon espace de vente</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right navbar-expand">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="votrecompte.html" id="navbarDropdownMenuLink" data-toggle="dropdown"aria-haspopup="true"aria-expanded="false">Votre Compte</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="profilvendeur.html">Mon Profil</a>
                    <a class="dropdown-item" href="votrecompte.html">Déconnexion</a>
                  </div>
                </li>
              </ul>
          </div>
        </div>
    </nav>
    <br>
	<br>
	<?php
	session_start();

	//identifier le nom de base de données
	echo "<meta charset=\"utf-8\">";
	$id=$_SESSION['sessionID'];
	$database = "ecemarketplace";
	//connectez-vous dans votre BDD
	//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);

	/*function transfert(){
			$database = "ecemarketplace";
			$db_handle = mysqli_connect('localhost', 'root', '' );
			$ret = false;
			$img_blob = '';
			$img_taille = 0;
			$img_nom    = '';
			$taille_max = 250000;
			echo $_FILES['fic']['error'];
			$ret = is_uploaded_file($_FILES['fic']['tmp_name']);
				if(!$ret) {
				echo "Problème de transfert";
            	return false;
			}else{
				// Le fichier a bien été reçu
            	$img_taille = $_FILES['fic']['size'];
            
            	if ($img_taille > $taille_max) {
               		echo "Le fichier est trop gros !";
                	return false;
            	}
            	$img_nom  = $_FILES['fic']['name'];
            	$img_blob = file_get_contents ($_FILES['fic']['tmp_name']);
            	$img_bloblashes = addslashes($img_blob);
            	$sql = "INSERT INTO images (image) VALUES ('$img_bloblashes')";
            	var_dump($sql);
            	$result = mysqli_query($db_handle, $sql);
            	var_dump($result);
            	return true;
				}*/
	//saisir les données de notre formulaire
	$nom = isset($_POST["nom"])? $_POST["nom"] : "";
	$prix = isset($_POST["prix"])? $_POST["prix"] : "";
	$qualites = isset($_POST["qualites"])? $_POST["qualites"] : "";
	$defauts = isset($_POST["defauts"])? $_POST["defauts"] : "";
	$ville= isset($_POST["ville"])? $_POST["ville"] : "";
	$categorievente= isset($_POST["categorievente"])? $_POST["categorievente"] : "";
	$categorieobjet= isset($_POST["categorieobjet"])? $_POST["categorieobjet"] : "";
	$image = isset($_POST["image"])? $_POST["image"] : "";
	 //si le BDD existe, faire le traitement
	if ($db_found) {
		/*var_dump($_FILES['fic']);
		if (isset($_FILES['fic'])) {
				echo "On essaye de mettre l'image";
				$imgpass = 1;
				transfert();
		}else{
				echo "On essaye pas de mettre l'image";
		}*/
		//on va chercher le produit dans la BDD
		$sql = "SELECT * FROM objets WHERE Nom LIKE '%$nom'";
		$result = mysqli_query($db_handle, $sql);
		//on regarde si il y'a des résultats
		if (mysqli_num_rows($result) != 0) {
			//Un article du même nom existe déjà
			echo "Un article du même nom existe déjà. <br>";	
			
		}
			//on ajoute l'article dans la BDD
			$sql = "INSERT INTO objets(IDvendeur, Nom, Prix, Defauts, Qualites, Typevente, Categorie) VALUES($id,'$nom', $prix ,'$defauts','$qualites','$categorievente','$categorieobjet')";
			$result = mysqli_query($db_handle,$sql);
			echo "Ajout confirmé <br>";
			//on affiche l'objet ajouté
			$sql = "SELECT * FROM objets WHERE Nom LIKE '%$nom'";
			$result = mysqli_query($db_handle, $sql);
			?>
			<table border=2>
			<tr>
				<thead>
				<th scope="col"><div class="tablo">ID</div></th>
				<th scope="col"><div class="tablo">Nom</div></th>
				<th scope="col"><div class="tablo">Prix</div></th>
				<th scope="col"><div class="tablo">Defauts</div></th>
				<th scope="col"><div class="tablo">Qualites</div></th>
				<th scope="col"><div class="tablo">Type de vente</div></th>
				<th scope="col"><div class="tablo">Categorie</div></th>
				</thead>
				</div>
			</tr>
			<br>
			<?php while ($data = mysqli_fetch_assoc($result)) {?>
				<tr>
					<tbody>
					<th scope="row"><?php echo $data['ID'];?> </th>
					<th><div class="tablo"><?php echo $data['Nom'];?> </div> </th>
					<th><div class="tablo"><?php echo $data['Prix'];?> </div> </th>
					<th><div class="tablo"><?php echo $data['Defauts'];?> </div> </th>
					<th><div class="tablo"><?php echo $data['Qualites'];?></div>  </th>
					<th><div class="tablo"><?php echo $data['Typevente'];?></div>  </th>
					<th><div class="tablo"><?php echo $data['Categorie'];?> </div></th>
				</tr>
				</tbody>
				</table>
			<?php } ?>
			<?php
			$sql = "SELECT ID FROM objets WHERE Nom LIKE '%$nom'";
			//on met l'id de l'objet dans le ID image
			$result = mysqli_query($db_handle, $sql);
			while ($data = mysqli_fetch_assoc($result)){
				$ID = $data['ID'];
			}
			$sql = "UPDATE objets SET IDimages = $ID WHERE ID = $ID";
			$result = mysqli_query($db_handle,$sql);
			$sql = "INSERT INTO images (image, IDphotos) VALUES ('$image',$ID)";
			$result = mysqli_query($db_handle,$sql);
			$sql = "SELECT * FROM images WHERE IDphotos = $ID";
			$result = mysqli_query($db_handle,$sql);
			while ($data = mysqli_fetch_assoc($result)){
				$img = $data['image'];
				echo "<tr>";
				echo "<td>"."<img src='$img' height='120' width='100'>"."</td>";
				echo "</tr>";
			}
	}//end if
	//si le BDD n'existe pas
	else {
	 echo "Database not found";
	}//end else
	//fermer la connection
	mysqli_close($db_handle);
	?>
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