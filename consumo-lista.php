<?php
include 'cabecalho-menu.php';
include 'conecta.php';
include 'consumo-banco.php';
?>
<h1>Consumo de Insumos Cervejeiros</h1>

<button class="btn btn-primary" onclick="window.location.href='consumo-form-adiciona.php'">Adiciona Consumo</button><br/><br/>

			<table class="table table-striped table-bordered">

				<?php
				$consumos = listaConsumo($conexao);
				foreach ($consumos as $consumo)
				{
				?>
					
					<tr>
						<td><?=$consumo['data_consumo']?></td>
						<td><?=$consumo['hora_consumo']?></td>
						<td><?=$consumo['dia_semana']?></td>
						<td><?=$consumo['cafe_nome']?></td>
						<td><?=$consumo['qtd']?></td>
						<td>R$<?=number_format($consumo['preco'],2,',',',')?></td>
						<td>
							<form name="form-remove" method="post" action="consumo-exclui.php">
							<input type="hidden" name="id" value="<?=$consumo['consumo_id']?>" />
							<button class="btn btn-danger">Remove</button>
							</form>
						</td>
					</tr>
				<?php
				}
				?>
			</table>
<?php
include 'rodape.php';
?>