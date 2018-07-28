<?php
session_start();

if(isset($_POST['email']) && !empty($_POST['email'])){
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));

	$dsn = "mysql:dbname=blog;host=localhost";
	$dbuser = "root";
	$dbpass = "";

	try{
		$pdo = new PDO($dsn, $dbuser, $dbpass);

		$sql = $pdo->query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");

		if($sql->rowCount() > 0){
			$dado = $sql->fetch();
			print_r($dado);

			$_SESSION['id'] = $dado['id'];

			header("Location: index.php");

		}

	}catch(PDOException $e){
		echo "Falhou a conexão com o banco: ".$e->getMessage();
	}
}

?>


<form method="POST">
	<label for="email">Email:</label><br/>
	<input type="text" name="email" id="email" /><br/><br/>

	<label for="senha">Senha:</label><br/>
	<input type="password" name="senha" id="senha"/><br/><br/>

	<input type="submit" value="Entrar"/>

</form>