<!DOCTYPE html>
<html>
	<?php include('public/componentes/head_page.inc');?>
<body>
	<?php include('public/componentes/header.inc');?>
	<main>
		<?php include('public/componentes/sidebar.inc');?>
		<?php include('public/componentes/msg.inc');?>
		<div class="content">
			<div class="box-dados">
				<div class="box-dados-title">
					<h1>Cadastrar veiculo</h1>
				</div>
				<div class="form_registrar">
					<form name="form" action="<?=base_url('/cadastrar/veiculo/salvar') ?>" method="post">
						<div class="container-input">
							<label for="placa_veiculo">Placa:</label>
							<input type="text" name="placa_veiculo" id="placa_veiculo">
						</div>
						<div class="container-input">
							<label for="desc_veiculo">Descrição:</label>
							<textarea name="desc_veiculo" id="desc_veiculo"></textarea>
						</div>
						</div>
							<div class="container-input">
							<label for="lugares">Capacidades(Lugares):</label>
							<input type="number" name="lugares" id="lugares">
						</div>
						<div class="container-input">
							<label for="categoria_veiculo">Categoria:</label>
							<select  name="categoria_veiculo" id="categoria_veiculo">
								<option  value="" >Selecionar categoria</option>
								<?php foreach ($categorias as $categoria):?>
									<option value="<?=$categoria->id_categoria?>"><?=$categoria->nome_categoria?>/<?=$categoria->status_categoria?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="Submit" value="Cadastrar veiculo">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
	<?php include('public/componentes/footer.inc');?>
</body>
</html>