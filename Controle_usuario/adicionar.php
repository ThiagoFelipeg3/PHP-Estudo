<?php
require 'config.php';

/*Se existir o campo 'nome' e ele não estiver vazio*/
if(isset($_POST['nome']) && empty($_POST['nome']) == false){
	echo "se besta";
	/*addslashes() simplesmente add uma barra invertida em lugares perigosos, evitando ataque como sql injection*/
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));

	$sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = '$senha'";
	$pdo->query($sql);

	/*Esta função vas a relocação da pagina*/
	header("Location: controle_usuarios.php");
}
?>


<form method="POST">
	Nome:<br/>
	<input type="text" name="nome"/><br/><br/>
	E-mail: <br/>
	<input type="text" name="email"/><br/><br/>
	Senha: <br/>
	<input type="password" name="senha"/><br/><br/>
	<input type="submit" value="Cadastrar"/>
</form>