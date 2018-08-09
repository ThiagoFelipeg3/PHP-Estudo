<?php
require 'config.php';
if(!empty($_POST['email'])) {

	$email = $_POST['email'];

	$sql = "SELECT * FROM usuarios WHERE email = :email";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(":email", $email);
	$sql->execute();

	if($sql->rowCount() > 0) {

		$sql = $sql->fetch();
		$id = $sql['id'];

		$token = md5(time().rand(0, 99999).rand(0, 99999));

		$sql = "INSERT INTO usuarios_token (id_usuario, hash, expirado_em) VALUES (:id_usuario, :hash, :expirado_em)";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":id_usuario", $id);
		$sql->bindValue(":hash", $token);
		$sql->bindValue(":expirado_em", date('Y-m-d H:i', strtotime('+2 months')));
		$sql->execute();

		$link = "http://localhost/projeto_esqueciasenha/redefinir.php?token=".$token;

		$mensagem = "Clique no link para redefinir sua senha:<br/>".$link;

		$assunto = "Redefinição de senha";

		$headers = 'From: seuemail@seusite.com.br'."\r\n" .
				   'X-Mailer: PHP/'.phpversion();

		//mail($email, $assunto, $mensagem, $headers);

		echo $mensagem;
		exit;

	}

}

?>
<form method="POST">
	Qual seu e-mail?<br/>
	<input type="email" name="email" /><br/>

	<input type="submit" value="Enviar"/>
</form>