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
					<h1>Editar veiculo</h1>
				</div>
				<div class="form_registrar">
					<form action="<?=base_url("veiculo-editar-salvar/{$consulta[0]->id_veiculo}") ?>" method="post">
						<div class="container-input">
							<label for="placa_veiculo">Placa:</label>
							<input type="text" name="placa_veiculo" id="placa_veiculo" value="<?=$consulta[0]->placa_veiculo?>">
						</div>
						<div class="container-input">
							<label for="desc_veiculo">Descrição:</label>
							<input type=text name="descricao_veiculo" id="desc_veiculo" value="<?=$consulta[0]->descricao_veiculo?>"></textarea>
						</div>
						<div class="container-input">
							<label>Status:</label>
							<select name="status_veiculo">
								<option value="<?=$consulta[0]->status_veiculo ?>">Status atual: <?=$consulta[0]->status_veiculo?></option>
								<option value="Disponivel">Disponivel</option>
								<option value="Indisponivel">Indisponivel</option>
							</select>
						</div>
						<div class="container-input">
							 <label>Categoria:</label>
							 <select  name="id_categoria">
							 <option  value="<?=$consulta[0]->id_categoria?>" >Categoria atual: <?=$consulta[0]->nome_categoria?>/<?=$consulta[0]->status_categoria?></option>';
							 	<?php foreach ($categorias as $categoria):?>
							 		<option value="<?=$categoria->id_categoria ?>"><?=$categoria->nome_categoria ?>/<?=$categoria->status_categoria ?></option>
							 	<?php endforeach; ?>
							</select>
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="submit"  value="Editar veiculo">
							</div>
						</div>
					</form>
				</div>
			</div>
	</main>
	<?php include('public/componentes/footer.inc');?>	
</body>
</html>