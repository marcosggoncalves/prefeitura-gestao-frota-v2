<!DOCTYPE html>
<html>
	<?php include('public/componentes/head_page.inc');?>
<body>
	<?php include('public/componentes/header.inc');?>
	<main>
		<?php include('public/componentes/sidebar.inc');?>
		<?php include 'public/componentes/msg.inc'?>
		<div class="content">
			<div class="box-dados">
				<div class="form_registrar">
					<form  action="<?=base_url("saida-manuntencao-finalizar-salvar/{$consulta[0]->id_saida_manuntencao}")?>" method="post">
 						<div class="box-dados-title">
							<h1>Registrar saida manuntenção veiculo <b> - (<?=$consulta[0]->placa_veiculo?>)</b></h1>
						</div>
						<div class="container-input">
							<label >Cód manuntenção:</label>
							<input type="number" name="cod_manuntencao" value="<?=$consulta[0]->id_saida_manuntencao?>" readonly>
						</div>
						<div class="container-input">
							<label fpr="data_manuntencao">Data saida:</label>
							<input type="text" name="data_manuntencao" id="data_manuntencao" value="<?= $consulta[0]->data_saida_veiculo?>" readonly>
						</div>
						<div class="container-input">
							<label for="km_saida_manuntencao">KM saida (campo editável):</label>
							<input type="text" name="km_saida_manuntencao" id="km_saida_manuntencao" value="<?= $consulta[0]->km_saida_veiculo ?>">
						</div>
						<div class="container-input">
							<label for="km_retorno_veiculo">Quilometragem chegeda (campo editável) : </label>
							<input type="text" name="km_retorno_veiculo" id="km_retorno_veiculo" value="<?=$consulta[0]->km_retorno_veiculo?>">
						</div>
						<?php if($consulta[0]->data_retorno_veiculo == null): ?>
							<div class="container-input">
								<label fpr="data_retorno_veiculo">Data chegada (campo editável):</label>
								<input type="datetime-local" name="data_retorno_veiculo" id="data_retorno_veiculo">
							</div>
						<?php else: ?>
							<div class="container-input">
								<label fpr="data_retorno_veiculo">Data chegada (campo editável):</label>
								<input type="text" name="data_retorno_veiculo" id="data_retorno_veiculo"  value="<?=$consulta[0]->data_retorno_veiculo?>">
							</div>
						<?php endif;?>
						<div class="container-input">
							<label for="placa_veiculo">Placa veiculo manuntenção:</label>
							<input type="text" name="placa_veiculo" id="placa_veiculo" value="<?=$consulta[0]->placa_veiculo ?>" readonly >
						</div>
						<div class="container-input">
							<label for="substituto_placa_veiculo">Placa veiculo substituto:</label>
							<input type="text" name="substituto_placa_veiculo" id="substituto_placa_veiculo" value="<?=$consulta[0]->veiculo_substituicao?>" readonly >
						</div>
						<div class="container-input">
							<label>Status:</label>
							<input type="text" name="status" value="<?=$consulta[0]->status ?>" readonly>
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="submit" value="Finalizar manuntenção">
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