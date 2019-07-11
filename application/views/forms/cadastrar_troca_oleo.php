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
					<h1>Registrar troca de óleo veiculo</h1>
				</div>
				<div class="form_registrar">
					<form name="form" action="../../php/request.php?page=Troca/oleo/salvar" method="post">
						<div class="container-input">
							<label for="km_troca">Quilometragem :</label>
							<input type="text" name="km_troca" id="km_troca" placeholder="Exemplo 124.09">
						</div>
						<div class="container-input">
							<label for="data_troca">Data:</label>
							<input type="datetime-local" id="data_troca" name="data_troca">
						</div>
						<div class="container-input">
							<label for="id_veiculo">Veículo:</label>
							<select name="id_veiculo" id="id_veiculo">
								<option  value="" >Selecionar veiculo</option>
								<?= todos_veiculos()?>
							</select>
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="button" name="button" onclick="inputs_name_validar('data_troca','km_troca','id_veiculo')" value="Registrar Troca">
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