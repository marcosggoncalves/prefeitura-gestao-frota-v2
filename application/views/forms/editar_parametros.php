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
					<h1>Alterar Parâmetros</h1>
				</div>
				<div class="form_registrar">
					<form name="form" action="<?=base_url('parametros/editar/salvar/'.$parametros->id_parametro .'') ?>" method="post">	
						<?php if (!isset($parametros->id_parametro )) : ?>
							<div class="container-input">
								<label for="id_parametro">ID:</label>
								<input type="text" name="id_parametro" id="id_parametro" value="<?=$parametros->id_parametro?>" readonly>
							</div>
						<?php endif;?>
						<div class="container-input">
							<label>Km para próxima troca de oléo:</label>
							<input type="number" name="km_troca_oleo" value="<?=$parametros->km_troca_oleo?>">
						</div>
						<div class="container-input">
							<label for="titulo_sistema">Titulo Sistema :</label>
							<input type="text" name="titulo_sistema" id="titulo_sistema" value="<?=$parametros->titulo_sistema?>">
						</div>
						<div class="container-input">
							<label for="subtitulo_sistema">SubTitulo Sistema :</label>
							<input type="text" name="subtitulo_sistema" id="subtitulo_sistema" value="<?=$parametros->subtitulo_sistema?>">
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="submit" value="Salvar">
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