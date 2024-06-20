<?php

date_default_timezone_set('Brazil/East');

include 'cabecalho-menu.php';
include 'conecta.php';
include 'consumo-banco.php';
include 'util.php';

$data = (array_key_exists('data', $_POST) && $_POST['data'] != '') ? $_POST['data'] : date('Y-m-d');
$hora = (array_key_exists('hora', $_POST) && $_POST['hora'] != '') ? $_POST['hora'] : date('H:i');
$qtd = (array_key_exists('qtd', $_POST) && $_POST['qtd'] != '') ? $_POST['qtd'] : 0;
$preco = (array_key_exists('preco', $_POST) && $_POST['preco'] != '') ? $_POST['preco'] : 0;
$cafe_id = $_POST['cafe_id'];

$dia_semana = diaSemana($data);

$adicionou = adicionaConsumo($conexao, $data, $hora, $cafe_id, $qtd, $preco, $dia_semana);
if ($adicionou)
{
	include 'rodape.php';
	header("Location: consumo-lista.php");
	die();
}
else {
?>
	<p class="text-danger">Erro ao tentar inserir o registro.</p>
	
<?php
}
include 'rodape.php';
?>