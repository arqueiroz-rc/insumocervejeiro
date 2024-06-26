<?php
include 'cabecalho-menu.php';
include 'conecta.php';
include 'insumo-banco.php';
?>

			<table class="table table-striped table-bordered">

			<thead>
    <tr>
      <th scope="col">Nome do Insumo</th>
      <th scope="col">Descrição</th>
      <th scope="col">Tipo</th>


    </tr>
  </thead>

				<?php
				$insumos = listaInsumo($conexao);
				foreach ($insumos as $insumo)
				{
				?>
					
					<tr>
						<td><?=$insumo['nome_insumo']?></td>
						<td><?=$insumo['descricao']?></td>
						<td><?=$insumo['nome_tipo']?></td>
						<td>
							<form name="form-altera" method="post" action="insumo-form-edita.php">
								<input type="hidden" name="id" value="<?=$insumo['id']?>" />
								<button class="btn btn-primary">Altera</button>							
							</form>
						</td>
						<td>
								<form name="form-remove" method="post" action="insumo-prepara-exclui.php">
								<input type="hidden" name="id" value="<?=$insumo['id']?>" />
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