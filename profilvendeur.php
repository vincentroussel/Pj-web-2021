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
 §id=$_SESSION['sessionID'];
 $sql = "SELECT * FROM vendeurs WHERE ID=$id ";
 $result = mysqli_query($db_handle, $sql);
  while ($data = mysqli_fetch_assoc($result)) {
 	echo "ID: " . $data['ID'] . '<br>';
 	echo "nom: " . $data['nom'] . '<br>';
 	echo "prenom: " . $data['prenom'] . '<br>';
 	echo "mail: " . $data['mail'] . '<br>';

 }//end while

}//end if
//si le BDD n'existe pas
else {
 echo "Database not found";
}//end else
//fermer la connection
mysqli_close($db_handle);
?>