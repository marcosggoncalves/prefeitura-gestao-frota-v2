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
					<h1>Registrar saida manutenção  veiculo</h1>
				</div>
				<div class="form_registrar">
					<form name="form" action="<?=base_url('registrar/saida/manuntencao/salvar') ?>" method="post">
						<div class="container-input">
							<label for="km_saida_veiculo">Quilometragem saida:</label>
							<input type="number" name="km_saida_veiculo" id="km_saida_veiculo">
						</div>

						<div class="container-input">
							<label for="desc_manuntencao">Descrição:</label>
							<textarea name="desc_manuntencao" id="desc_manuntencao" value='descricao' placeholder="Descreva a manutenção  do veiculo -  Exemplo: Veiculo saiu para manutenção  na suspensão traseira"></textarea>
						</div>
						<div class="container-input">
							<label for="id_veiculo">Veículo saida para manutenção :</label>
							<select name="id_veiculo">
								<option value=""  >Selecionar veiculo</option>
								<?php  foreach ($veiculos_servico as $veiculos_disp) :?>
									<option value="<?=$veiculos_disp->id_veiculo?>"><?=$veiculos_disp->placa_veiculo?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="container-input">
							<label for="placa_veiculo">Veículo reserva para substituir:</label>
							<select name="placa_veiculo">
								<option value=""  >Selecionar veiculo</option>
								<option value="Veiculo não substituido">Não substituir</option>
								<?php  foreach ($veiculos_reserva as $veiculos_disp) :?>
									<option value="<?=$veiculos_disp->placa_veiculo?>"><?=$veiculos_disp->placa_veiculo?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="submit" name="button"  value="Registrar saida">
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