<?php
function adicionaInsumo($conexao, $nome, $descricao, $tipo_id)
{
	$query = "insert into insumo (nome, descricao, tipo_id) values (?,?,?) ";
	$instrucao = $conexao->prepare($query);
	$instrucao->bind_param('ssi', $nome, $descricao, $tipo_id);
	return $instrucao->execute();
}

function removeInsumo($conexao, $id)
{
	$query = "delete from insumo where id = ? ";
	$instrucao = $conexao->prepare($query);
	$instrucao->bind_param('i', $id);
	return $instrucao->execute();
}

function alteraInsumo($conexao, $id, $nome, $descricao, $tipo_id)
{
	$query = "update insumo set nome = ?, descricao = ?, tipo_id = ? where id = ? ";
	$instrucao = $conexao->prepare($query);
	$instrucao->bind_param('ssii', $nome, $descricao, $tipo_id, $id);
	return $instrucao->execute();
}
function listaInsumo($conexao)
{
	$insumos = array();
	
	$query = "select i.id, i.nome as nome_insumo, i.descricao, t.nome as nome_tipo from insumo i ";
	$query .= " inner join tipo t on (i.tipo_id = t.id) ";
	$instrucao = $conexao->prepare($query);
	$instrucao->execute();
	$resultado = $instrucao->get_result();
	while ($insumo = $resultado->fetch_assoc())
	{
		array_push($insumos, $insumo);
	}
	
	return $insumos;
}

function buscaInsumoPorID($conexao, $id)
{
	$query = "select id, nome, descricao, tipo_id from insumo where id = ? ";
	$instrucao = $conexao->prepare($query);
	$instrucao->bind_param('i', $id);
	$instrucao->execute();
	$resultado = $instrucao->get_result();
	return $resultado->fetch_assoc();
}