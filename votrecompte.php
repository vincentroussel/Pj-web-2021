<?php
	session_start();
	$mail = isset($_POST["mail"])? $_POST["mail"] : "";
	$motdepasse = isset($_POST["password"])? $_POST["password"] : "";
	$typecompte = isset($_POST["typecompte"])? $_POST["typecompte"] : "";
	$database = "ecemarketplace";
	$db_handle = mysqli_connect('localhost', 'root', '' );
	$db_found = mysqli_select_db($db_handle, $database);
	if ($db_found) {
		if ($typecompte == 'acheteur') {
			$sql = 'SELECT * FROM acheteurs'; 
		}
		if ($typecompte == 'vendeur') {
			$sql = 'SELECT * FROM vendeurs WHERE admin = 0'; 
		}
		if ($typecompte == 'admin') {
			$sql = 'SELECT * FROM vendeurs WHERE admin = 1'; 
		}
		if ($typecompte == '') {
			$URL = 'votrecompte.';
		}else{
		$verif = 0;
		$result = mysqli_query($db_handle,$sql);
		while ($data = mysqli_fetch_assoc($result)){
			if (($data['Mail'] == $mail) && ($data['Motdepasse'] == $motdepasse)) {
				$_SESSION['sessionID'] = $data['ID'];
				$verif = 1;
				$mem = $data['ID'];
			}
		}
		if ($verif == 0) {
			$URL = 'votrecompte.';
			//header('Location : votrecompte.html');
		}else{
				$_SESSION['IDsession'] = $mem;
				if ($typecompte == 'acheteur') {
					//echo "acheteur";
					$URL = 'accueilAcheteur.';
					//header('Location : accueilAcheteur.html');
				}
				if ($typecompte == 'vendeur') {
					//echo "vendeur";
					$URL = 'pagevendeur.';
					//header('Location : pagevendeur.html');
				}
				if ($typecompte == 'admin') {
					//echo "admin";
					$URL = 'pageadmin.';
					//header('Location : pageadmin.html');
				}
			}	
		}
		
	}header('Location: '.$URL.html);
	exit();
	?>