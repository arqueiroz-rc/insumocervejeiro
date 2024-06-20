<?php
function diaSemana($data)
{
	$dias_semana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado');
	$a_data = date($data);
	$dia_semana_numero = date('w', strtotime ($a_data));
	return $dias_semana[$dia_semana_numero];
}