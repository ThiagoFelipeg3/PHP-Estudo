<?php
include 'contato.class.php';
$contato = new Contato();

if(!empty($_GET['id'])){
	$id = addslashes($_GET['id']);

	$info = $contato->getInfo($id);

	//Medidas de seguraças.
	if(empty($info['email'])){
		header('Location: index.php');
		exit;
	}

}else{
	header('Location: index.php');
}

?>	
<h1>EDITAR USUÁRIO</h1>
<form method="POST" action="editar_submit.php">
	
	<!----------------------------------------------------------------------------------
	- Como o conteúdo digitato pelo usuário vai ser mandado para outro documento,
	- sendo assim utilzei o input hidden que fica escondido e o usuário não consegue ver.
	- O input manda o id do usuário.
	------------------------------------------------------------------------------------>
	<input type="hidden" name="id" value="<?php echo $info['id']; ?>" />

	<label for="nome">NOME: </label><br/>
	<input type="text" name="nome" id="nome" value="<?php echo $info['nome']; ?>"/><br/><br/>

	<label for="email">EMAIL:</label><br/>
	<input type="email" name="email" id="email" value="<?php echo $info['email']; ?>"/><br/><br/>

	<input type="submit" value="SALVAR"/>

</form>