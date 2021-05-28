<?php
	session_start();
	$IDobjet = isset($_POST["IDobjet"])? $_POST["IDobjet"] : "";
	$IDenchere = isset($_POST["IDenchere"])? $_POST["IDenchere"] : "";

	$_SESSION['IDobjet']=$IDobjet;
	$_SESSION['IDenchere']=$IDenchere;

	header('Location=encheresacheteur.html');
?>