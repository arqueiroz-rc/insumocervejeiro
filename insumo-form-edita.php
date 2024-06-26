<?php
include 'cabecalho-menu.php';
include 'conecta.php';
include 'insumo-banco.php';
include 'tipo-banco.php';


$id = $_POST['id'];

$insumo = buscaInsumoPorID($conexao, $id);
$tipos = listaTipo($conexao);

?>

<h1>Altera Insumo</h1>
<form action="" method="post" name="forminsumo">
	<input type="hidden" name="id" value="<?=$insumo['id']?>" />
	<table class="table">
		<tr>
			<td>Nome *</td>
			<td><input class="form-control" type="text" name="nome" id="nome" value="<?=$insumo['nome']?>" /></td>
		</tr>
		<tr>
			<td>Descrição *</td>
			<td><textarea class="form-control" name="descricao" id="descricao" ><?=$insumo['descricao']?></textarea></td>
		</tr>
		<tr>
			<td>Tipo *</td>
			<td>
				<select class="form-control" name="tipo_id">
				
					<?php
					foreach($tipos as $tipo)
					{
							$opcaoSelecionada = ($insumo['tipo_id'] == $tipo['id']) ? "selected='selected'" : "";
					?>
					
						<option value="<?=$tipo['id']?>" <?=$opcaoSelecionada ?> > <?=$tipo['nome']?> </option>
					
					<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
		<td><button class="btn btn-primary" type="button" onclick="validaForm('insumo-edita.php')">Salvar</button></td>
		</tr>
	</table>
</form>

<div id="msg-erro"><p class="text-danger"> </p></div>

<?php
include 'rodape.php';
?>

<script src="js/funcoes/insumo.js"></script>
