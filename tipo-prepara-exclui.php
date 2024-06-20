<?php
include 'cabecalho-menu.php';
include 'conecta.php';
include 'tipo-banco.php';


$id = $_POST['id'];

$tipo = buscaTipoPorID($conexao, $id);
?>

<h1>Confirma remover o Tipo</h1>
<form action="tipo-exclui.php" method="post">
	<input type="hidden" name="id" value="<?=$tipo['id']?>" />
	<table class="table">
		<tr>
			<td>Nome</td>
			<td><input class="form-control" type="text" name="nome" value="<?=$tipo['nome']?>" readonly/></td>
		</tr>
		<tr>
			<td><button class="btn btn-primary" type="submit">Remover</button></td>
		</tr>
	</table>
</form>

<?php
include 'rodape.php';
?>