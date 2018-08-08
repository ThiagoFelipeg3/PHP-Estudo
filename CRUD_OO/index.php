<?php
include 'contato.class.php';

$contato = new Contato();

$contato->adicionar("thiagof.g3@gmail.com","Thiago Felipe");

?>
<h1>Constatos</h1>

<a href="adicionar.php">[ ADICIONAR ]</a><br/><br/>
<table border="1" width="600">
	<tr>
		<th>Id</th>
		<th>Nome</th>
		<th>Email</th>
		<th>Ações</th>
	</tr>
	<?php
		$list = $contato->getAll();
		foreach($list as $item):
	?>
	<tr>
		<td><?php echo $item['id']; ?></td>
		<td><?php echo $item['nome']; ?></td>
		<td><?php echo $item['email']; ?></td>
		<td>
			<a href="editar.php?id=<?php echo $item['id']; ?>">[ EDITAR ]</a>
			<a href="excluir.php?id=<?php echo $item['id']; ?>">[ EXCLUIR]</a>
		</td>
	</tr>
	<?php endforeach; ?>

</table>