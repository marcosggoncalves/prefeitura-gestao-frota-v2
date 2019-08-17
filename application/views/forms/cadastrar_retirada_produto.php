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
					<h1>Registrar retirada produto</h1>
				</div>
				<div class="form_registrar">
					<form name="form" action="<?=base_url('/registrar/retirada/produto/salvar')?>" method="post">
						<div class="container-input">
							<label for="quantidade_retirada">Quantidade:</label>
							<input type="number" name="quantidade_retirada" id="quantidade_retirada">
						</div>
						<div class="container-input">
							<label for="data_retirada_produto">Data retirada:</label>
							<input type="datetime-local" name="data_retirada_produto" id="data_retirada_produto">
						</div>
						<div class="container-input">
							<label for="id_produto">Produto:</label>
							<select name="id_produto" id="id_produto">
								<option  value="" >Selecionar veiculo</option>
								<?php foreach ($produtos as $produto):?>
									<option value="<?=$produto->id_produto?>"><?=$produto->nome_produto?></option>
								<?php endforeach ?>
							</select>
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
								<input type="submit"  value="Registrar retirada produto">
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