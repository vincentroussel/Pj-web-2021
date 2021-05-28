<?php
	session_start();
	$inter = array();
	$typeobjet = isset($_POST["typeobjet"])? $_POST["typeobjet"] : "";
	$database = "ecemarketplace";
	//var_dump($typeobjet);
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
	if ($db_found) {
		$sql="SELECT * FROM panier WHERE 'IDacheteurs'=$_SESSION['sessionID']" ;
		$result = mysqli_query($db_handle, $sql);
		
		while ($data = mysqli_fetch_assoc($result)) {
			array_push($inter, $data);
			//var_dump($data);
		}
		//echo "inter";
		//var_dump($inter);
		$_SESSION['listeobjetspanier']=$inter;
		//echo "listeobjet";
		//var_dump($_SESSION['listeobjets']);
	}else {
 			echo "Database not found";
		}
	mysqli_close($db_handle);
	header('Location: panier.php');
	exit();
?>