<?php
include 'cabecalho-menu.php';
include 'conecta.php';
include 'insumo-banco.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$tipo_id = $_POST['tipo_id'];

$alterou = alteraInsumo($conexao, $id, $nome, $descricao, $tipo_id);
if ($alterou)
{
?>
	<p class="text-sucess">Registro <?=$nome?> alterado com sucesso.</p>
<?php
}
else {
?>
	<p class="text-danger">Erro ao tentar alterar o registro <?=$nome?>.</p>
	
<?php
}
include 'rodape.php';
?>