<?php

require 'config.php';

	/*Se existe e se ele não esta vazio*/
	if(isset($_GET['id']) && !empty($_GET['id'])){
		$id = addslashes($_GET['id']);

		$sql = "DELETE FROM usuarios WHERE id = '$id'";
		$pdo->query($sql);

		header("Location:controle_usuarios.php");

	}else{
		header("Location:controle_usuarios.php");
	}

?>