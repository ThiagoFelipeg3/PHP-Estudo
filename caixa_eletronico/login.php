<?php 
session_start();

require 'config.php';

	if(isset($_POST['agencia']) && !empty($_POST['agencia'])){
		$agencia = addslashes($_POST['agencia']);
		$conta = addslashes($_POST['conta']);
		$senha = md5(addslashes($_POST['senha']));

		$sql = "SELECT * FROM contas WHERE agencia = '$agencia' AND conta = '$conta' AND senha = '$senha'";
		$sql = $pdo->query($sql);

		if($sql->rowCount() > 0){
			$sql = $sql->fetch();
			
			$_SESSION['banco'] = $sql['id'];

			header("Location: index.php");
			exit;
		}else{
			echo "Senha e/ou conta e/ou agencia errado";
		}

	}

?>
<html>
	<head>
		<title>Caixa Eletrônico</title>
	</head>
	<body>
		<form method="POST">
			<label for="agencia">Agencia:</label><br/>
			<input type="text" name="agencia" id="agencia"/><br/><br/>

			<label for="conta">Conta:</label><br/>
			<input type="conta" name="conta" id="conta"/><br/><br/>
			
			<label for="senha">Senha:</label><br/>
			<input type="password" name="senha" id="senha"/> <br/><br/>

			<br/><br/>
			<input type="submit" valur="Entrar"/>

		</form>
		
	</body>
</html>
