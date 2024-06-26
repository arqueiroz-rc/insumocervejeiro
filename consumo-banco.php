<?php
function listaConsumo($conexao)
{
	$consumos = array();
	
	$query  = " select c.id as consumo_id, date_format(c.data, '%d/%m/%Y') as data_consumo, ";
	$query .= " date_format(c.hora, '%H:%i') as hora_consumo, c.dia_semana, ";
	$query .= " c.preco, c.qtd, i.nome as insumo_nome ";
	$query .= " from consumo c ";
	$query .= " inner join insumo i on (i.id = c.insumo_id) ";
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

function adicionaConsumo($conexao, $data, $hora, $insumo_id, $qtd, $preco, $dia_semana)
{
	$query = "insert into consumo (data, hora, insumo_id, qtd, preco, dia_semana) values (?,?,?,?,?,?) ";
	$instrucao = $conexao->prepare($query);
	$instrucao->bind_param('ssisds', $data, $hora, $insumo_id, $qtd, $preco, $dia_semana);
	return $instrucao->execute();
}

