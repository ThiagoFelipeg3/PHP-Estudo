<?php

include 'contato.class.php';
$contato = new Contato();

if(isset($_POST['id']) and !empty($_POST['id'])){
	$id = addslashes($_POST['id']);
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);

	$contato->editar($id,$nome,$email);	

	 header('Location: index.php');
}
