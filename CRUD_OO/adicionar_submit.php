<?php

include 'contato.class.php';
$contato = new Contato();

if(isset($_POST['email']) and !empty($_POST['email'])){
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);

	$contato->adicionar($email, $nome);

	 header('Location: index.php');
}
