<?php
try{
	$pdo = new PDO("mysql:dbname=projeto_ordenar;host=localhost","root","");



}catch(PDOException $e){
	echo "Falhou: ".$e->getMassage();
	exit;
}
		if(isset($_POST['ordem']) && !empty($_POST['ordem'])){
			$ordem = addslashes($_POST['ordem']);

			$sql = "SELECT * FROM usuario ORDER BY ".$ordem;
		}else{
			$ordem = '';
			$sql = "SELECT * FROM usuario";
		}
?>
<form method="POST">
	<select name="ordem" onchange="this.form.submit()">
		<option></option>
		<option value="nome"<?php echo ($ordem == "nome")?'selected="selected"':''?> >Pelo Nome</option>
		<option value="idade" <?php echo ($ordem == "idade")?'selected="selected"':''?> >Pela Idade</option>

	</select>
</form>
<table border="1" width="400">
	<tr>
		<th>Nome</th>
		<th>Idade</th>
	</tr>
	<?php	
		
		echo "Consulta: ".$sql;
		$sql = $pdo->query($sql);

		if($sql->rowCount() > 0){

			foreach($sql->fetchAll() as $usuario):
	?>
		<tr>
			<td><?php echo $usuario['nome'] ?></td>
			<td><?php echo $usuario['idade'] ?></td>
		</tr>
	<?php		
			endforeach;	
		}

	?>
</table>