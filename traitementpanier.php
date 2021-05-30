<?php
	session_start();
	$interpanier = array();
	$interobjets=array();

	$database = "ecemarketplace";
	//var_dump($typeobjet);
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
	if ($db_found) {
		$_SESSION['passe'] = 1;
		$ID = $_SESSION['sessionID'];
		$sql="SELECT IDobjets FROM panier WHERE ID= $ID" ;
		$result = mysqli_query($db_handle, $sql);
		
		while ($data = mysqli_fetch_assoc($result)) {
			array_push($interpanier, $data);
			//var_dump($data);
		}
		$length=count($interpanier);
		for ($i=0;$i<$length;$i++){
			$IDobjet = intval($interpanier[$i]['IDobjets']);
			$sql="SELECT * FROM objets WHERE ID=$IDobjet AND IDvendu = 0";
			$result = mysqli_query($db_handle, $sql);
			while ($data = mysqli_fetch_assoc($result)) {
				array_push($interobjets, $data);
			}
		}
		//echo "inter";
		//var_dump($inter);
		$_SESSION['listeobjetspanier']=$interobjets;
		//$sql="SELECT ID FROM panier WHERE 'IDacheteurs'=$_SESSION['sessionID']";
		//$result = mysqli_query($db_handle, $sql);
		//while ($data = mysqli_fetch_assoc($result)) {
		//	array_push($interpanier, $data);
			//var_dump($data);
		//}
		$length2=count($interobjets);
		for($i=0;$i<$length2;$i++){
			if($interobjets[$i]['Categorie']=='enchere'){
				$sql="SELECT ID from encheres WHERE IDobjets=$interobjet[$i]['ID']";
				$result = mysqli_query($db_handle, $sql);
				while ($data = mysqli_fetch_assoc($result)) {
					array_push($interpanier, $data);
					//var_dump($data);
				}
			}
			if($interobjets[$i]['Categorie']=='nego'){
				$sql="SELECT ID FROM negociation WHERE  IDobjets=$interobjet[$i]['ID'] AND IDvendeur= $ID";
				$result = mysqli_query($db_handle, $sql);
				while ($data = mysqli_fetch_assoc($result)) {
					array_push($interpanier, $data);
					//var_dump($data);
				}
			}
			if($interobjets[$i]['Categorie']=='vente'){
				array_push($interpanier, 0);
			}
		}
		$_SESSION['listeIDpanier']=$interpanier;
		//echo "listeobjet";
		//var_dump($_SESSION['listeobjets']);
	}else {
 			echo "Database not found";
		}
	mysqli_close($db_handle);
	header('Location: panier.php');
	exit();
?>