<?php 
	try{
		$pdo = new PDO("mysql:dbname=projeto;host=localhost","root","");

	}catch(PDOException $e){
		echo "Erro: ".$e->getMassage();
	}



?>