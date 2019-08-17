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
					<h1>Registrar troca de óleo veiculo</h1>
				</div>
				<div class="form_registrar">
					<form name="form" action="<?=base_url('registrar/troca/oleo/salvar') ?>" method="post">
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
								<?php foreach ($veiculos as $veiculo):?>
									<option value="<?=$veiculo->id_veiculo?>"><?=$veiculo->placa_veiculo?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="submit"  value="Registrar Troca">
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