<?php
session_start();
//identifier le nom de base de données
$database = "ecemarketplace";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);
 //si le BDD existe, faire le traitement
if ($db_found) {
	$_SESSION['passe'] = 1;
	$ID = intval($_SESSION['sessionID']);
 $sql = "SELECT * FROM vendeurs WHERE ID=$ID ";
 $result = mysqli_query($db_handle, $sql);
  while ($data = mysqli_fetch_assoc($result)) {
 	$nom=$data['Nom'];
 	$prenom=$data['Prenom'];
 	$mail=$data['Mail'];
 	$motdepasse=$data['Motdepasse'];

 }//end while
 $_SESSION['nom']=$nom;
 $_SESSION['prenom']=$prenom;
 $_SESSION['mail']=$mail;
 $_SESSION['motdepasse']=$motdepasse;
}//end if
//si le BDD n'existe pas
else {
 echo "Database not found";
}//end else
//fermer la connection
mysqli_close($db_handle);
header('Location: profiladmin.php');
?>