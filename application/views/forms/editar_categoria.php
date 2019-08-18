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
					<h1>Cadastrar categoria</h1>
				</div>
				<div class="form_registrar">
					<form name="form" action="<?=base_url("categoria-editar-salvar/{$consulta[0]->id_categoria}")?>" method="post">
						<div class="container-input">
							<label>Nome:</label>
							<input type="text" name="nome_categoria" value="<?=$consulta[0]->nome_categoria ?>">
						</div>
						<div class="container-input">
							<label>Status</label>
							<select name="status_categoria">
								<option  value="<?=$consulta[0]->id_categoria ?>" >Tipo categoria atual: <?=$consulta[0]->status_categoria ?></option>
								<option>Reserva</option>
								<option>Serviço</option>
							</select>
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="Submit" value="Editar categoria">
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