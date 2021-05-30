<?php
	session_start();
	date_default_timezone_set('France/Paris');

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
			$message='enchere terminée. Le vendeur '.$check.' a gagne et vous paye '.$prixpaye. ' euros.';
			$sql="UPDATE IDvendu FROM encheres SET'1' WHERE 'IDobjets'=$_SESSION['IDobjet']";
		}
		else{
			$sql="SELECT Prix1,Prix2,IDacheteurs FROM encheres WHERE 'IDobjets'=$_SESSION['IDobjet']";
			$result = mysqli_query($db_handle, $sql);
			while ($data = mysqli_fetch_assoc($result)) {
				$prix1=$data['Prix1'];
				$prix2=$data['Prix2'];
				$check=$data['IDacheteur'];
			}
			$message='enchere en cours. Actuellement acheteur '. $check.' a mis la meilleure offre a '.$prix1.' euros. La seconde meilleure offre est de '.$prix2.'euros.';
		}
	}else {
 			echo "Database not found";
		}
	mysqli_close($db_handle);
?>