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
					<h1>Alterar km de troca</h1>
				</div>
				<div class="form_registrar">
					<form action="<?=base_url("troca-oleo-editar-km-salvar/{$consulta[0]->id_controle_troca_oleo}")?>" method="post">
						<div class="container-input">
							<label for="km_troca">KM Troca óleo:</label>
							<input type="text" id="km_troca" name="km_troca" value="<?=$consulta[0]->km_troca?>">
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="submit"  value="Alterar registro">
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