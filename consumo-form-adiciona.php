<?php
include 'cabecalho-menu.php';
include 'conecta.php';
include 'insumo-banco.php';

$insumos = listaInsumo($conexao);

?>

<h1>Novo Consumo</h1>
<form action="consumo-adiciona.php" method="post">
	<table class="table">
		<tr>
			<td>Data</td>
			<td><input class="form-control" type="date" name="data" /></td>
		</tr>
		<tr>
			<td>Hora</td>
			<td><input class="form-control" type="time" name="hora" /></td>
		</tr>
		<tr>
			<td>Insumo</td>
			<td>
				<select class="form-control" name="insumo_id">
					<?php
					foreach($insumos as $insumo)
					{
					?>
						<option value="<?=$insumo['id']?>"> <?=$insumo['nome_insumo']?> </option>
					<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Qtd</td>
			<td><input class="form-control" type="text" name="qtd" min="0" /></td>
		</tr><tr>
			<td>Preço</td>
			<td><input class="form-control" type="number" name="preco" min="0.00" max="9999.00" step="0.01" /></td>
		</tr>
		<tr>
		<td><button class="btn btn-primary" type="submit">Adiciona Consumo</button></td>
		</tr>
	</table>
</form>

<?php
include 'rodape.php';
?>