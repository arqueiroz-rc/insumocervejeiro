<?php
include 'cabecalho-menu.php';
include 'conecta.php';
include 'insumo-banco.php';
?>

			<table class="table table-striped table-bordered">

				<?php
				$cafes = listaCafe($conexao);
				foreach ($cafes as $cafe)
				{
				?>
					
					<tr>
						<td><?=$cafe['nome_cafe']?></td>
						<td><?=$cafe['descricao']?></td>
						<td><?=$cafe['nome_tipo']?></td>
						<td>
							<form name="form-altera" method="post" action="cafe-form-edita.php">
								<input type="hidden" name="id" value="<?=$cafe['id']?>" />
								<button class="btn btn-primary">Altera</button>							
							</form>
						</td>
						<td>
								<form name="form-remove" method="post" action="cafe-prepara-exclui.php">
								<input type="hidden" name="id" value="<?=$cafe['id']?>" />
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