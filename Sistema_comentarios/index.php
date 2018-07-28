<?php
try{
	$pdo= new PDO("mysql:dbname=sistema_comentarios;host=localhost","root","");


}catch(PDOException $e){
	echo "ERRO: ".$e->getMessage();
	exit;
}
if(isset($_POST['nome']) && !empty($_POST['nome'])){
	$nome = $_POST['nome'];
	$mensagem = $_POST['mensagem'];

	$sql = "INSERT INTO mensagens SET nome = '$nome', msg = '$mensagem', data_msg = NOW()";
	$sql = $pdo->query($sql);

}

?>

<fieldset>
	<form method="POST">
		Nome:<br/>
		<input type="text" name="nome"/><br/><br/>

		Mensagens:<br/>
		<textarea name="mensagem"></textarea><br/><br/>

		<input type="submit" value="Enviar Mensagem">
	</form>
</fieldset>
<?php

$sql = "SELECT * FROM mensagens ORDER BY data_msg DESC";
$sql = $pdo->query($sql);

if($sql->rowCount() > 0){
	foreach($sql->fetchAll() as $mensagem):
		?>
		<br/><br/>
		<strong><?php echo $mensagem['nome']; ?></strong><br/>
		<?php echo $mensagem['msg']."<br/>".$mensagem['data_msg']; ?>
		<hr/>		
		<?php
	endforeach;	
}else{
	echo "Nao ah mensagens";
}


?>








