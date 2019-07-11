
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
					<h1>Registrar saida manuntenção veiculo</h1>
				</div>
				<div class="form_registrar">
					<form name="form" action="../../php/request.php?page=Salvar/Manuntenção" method="post">
						<div class="container-input">
							<label for="km_saida_veiculo">Quilometragem saida:</label>
							<input type="number" name="km_saida_veiculo" id="km_saida_veiculo">
						</div>

						<div class="container-input">
							<label for="desc_manuntencao">Descrição:</label>
							<textarea name="desc_manuntencao" id="desc_manuntencao" value='descricao' placeholder="Descreva a manuntenção do veiculo -  Exemplo: Veiculo saiu para manuntenção na suspensão traseira"></textarea>
						</div>
						<div class="container-input">
							<label for="id_veiculo">Veículo saida para manuntenção:</label>
							<select name="id_veiculo">
								<option value=""  >Selecionar veiculo</option>
								<?=veiculos_status('','','Todos')?>
							</select>
						</div>
						<div class="container-input">
							<label for="placa_veiculo">Veículo reserva para substituir:</label>
							<select name="placa_veiculo">
								<option value=""  >Selecionar veiculo</option>
								<option value="Veiculo não substituido">Não substituir</option>
								<?=veiculos_status(0,'Reserva','');?>
							</select>
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="button" name="button" onclick="inputs_name_validar('km_saida_veiculo','id_veiculo','placa_veiculo')" value="Registrar saida">
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