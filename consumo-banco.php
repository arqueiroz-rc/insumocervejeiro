<?php
function listaConsumo($conexao)
{
	$consumos = array();
	
	$query  = " select co.id as consumo_id, date_format(co.data, '%d/%m/%Y') as data_consumo, ";
	$query .= " date_format(co.hora, '%H:%i') as hora_consumo, co.dia_semana, ";
	$query .= " co.preco, co.qtd, ca.nome as cafe_nome ";
	$query .= " from consumo co ";
	$query .= " inner join cafe ca on (ca.id = co.cafe_id) ";
	$query .= " where 1=1 ";

	$instrucao = $conexao->prepare($query);
	$instrucao->execute();
	$resultado = $instrucao->get_result();
	while ($consumo = $resultado->fetch_assoc())
	{
		array_push($consumos, $consumo);
	}
	
	return $consumos;
}

function removeConsumo($conexao, $id)
{
	$query = "delete from consumo where id = ? ";
	$instrucao = $conexao->prepare($query);
	$instrucao->bind_param('i', $id);
	return $instrucao->execute();
}

function adicionaConsumo($conexao, $data, $hora, $cafe_id, $qtd, $preco, $dia_semana)
{
	$query = "insert into consumo (data, hora, cafe_id, qtd, preco, dia_semana) values (?,?,?,?,?,?) ";
	$instrucao = $conexao->prepare($query);
	$instrucao->bind_param('ssisds', $data, $hora, $cafe_id, $qtd, $preco, $dia_semana);
	return $instrucao->execute();
}

