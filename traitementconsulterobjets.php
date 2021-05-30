<?php
	session_start();
	$interobjet = array();
	$interpanier=array();
	$intervendeurs=array();
	$inter=array();
	$id=$_SESSION['sessionID'];
	$database = "ecemarketplace";
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
	if ($db_found) {
		$_SESSION['passe'] = 1;
		$sql="SELECT * FROM objets WHERE IDvendeur =$id AND IDvendu = 0" ;
		$result = mysqli_query($db_handle, $sql);
		
		while ($data = mysqli_fetch_assoc($result)) {
			array_push($interobjet, $data);
		}
		$_SESSION['listeobjetsvendeur']=$interobjet;
		$lenght=count($interobjet);
		for($i=0;$i<$lenght;$i++){
			if($interobjet[$i]['Typevente']=='enchere'){
				$sql="SELECT ID from encheres WHERE IDobjets=$interobjet[$i]['ID']";
				$result = mysqli_query($db_handle, $sql);
				while ($data = mysqli_fetch_assoc($result)) {
					array_push($interpanier, $data);
					//var_dump($interpanier);
				}
			}
			if($interobjet[$i]['Typevente']=='nego'){
				$IDobjets = intval($interobjet[$i]['ID']);
				$sql="SELECT ID FROM negociation WHERE IDobjets=$IDobjets";
				$result = mysqli_query($db_handle, $sql);
				while ($data = mysqli_fetch_assoc($result)) {
					array_push($inter, $data['ID']);
					//var_dump($inter);
				}
				array_push($interpanier, $inter);
			}
			if($interobjet[$i]['Typevente']=='vente'){
				array_push($interpanier, 0);
			}
		}
		//var_dump($interpanier);
		$_SESSION['listeIDpanier']=$interpanier;
	}else {
 			echo "Database not found";
		}
	mysqli_close($db_handle);
	header('Location: consulterobjets.php');
	exit();
?>