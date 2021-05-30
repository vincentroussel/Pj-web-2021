<?php
	session_start();
	$IDobjet = isset($_POST["IDobjet"])? $_POST["IDobjet"] : "";
	$IDnego = isset($_POST["IDnego"])? $_POST["IDnego"] : "";

	$_SESSION['IDobjet']=$IDobjet;
	$_SESSION['IDnego']=$IDnego;

	header('Location: negociationadminacheteur.html');
?>