<!-- controller -->
    <?php include '../../php/autoload.php'; ?>
<!-- ---------- -->
<!DOCTYPE html>
<html>
	<?php include '../componentes/head_page.inc'?>
<body>
	<?php include '../componentes/header.inc'?>
	<main>
		<?php include '../componentes/sidebar.inc'?>
		<div class="content">
			<div class="box-dados">
				<div class="box-dados-title">
					<h1>Cadastrar veiculo</h1>
				</div>
				<div class="form_registrar">
					<form name="form" action="../../php/request.php?page=Salvar/veiculo" method="post">
						<div class="container-input">
							<label for="placa_veiculo">Placa:</label>
							<input type="text" name="placa_veiculo" id="placa_veiculo">
						</div>
						<div class="container-input">
							<label for="desc_veiculo">Descrição:</label>
							<textarea name="desc_veiculo" id="desc_veiculo"></textarea>
						</div>
						<div class="container-input">
							<label for="categoria_veiculo">Categoria:</label>
							<select  name="categoria_veiculo" id="categoria_veiculo">
								<option  value="" >Selecionar categoria</option>
								<?=todas_categorias()?>
							</select>
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="button" name="button" onclick="inputs_name_validar('placa_veiculo','desc_veiculo','categoria_veiculo')" value="Cadastrar veiculo">
							</div>
						</div>
						<div>
							<?php include '../componentes/msg.inc' ?>
						</div>
					</form>
				</div>
			</div>
		</div>		
	</main>
	<?php include '../componentes/footer.inc'?>
</body>
</html>