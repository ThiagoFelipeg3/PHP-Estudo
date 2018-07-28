<?php
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION)){
	echo "Área restrita ...";
}else{

	header("Location: login.php");
}

?>