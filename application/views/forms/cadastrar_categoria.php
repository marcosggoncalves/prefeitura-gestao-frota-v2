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
					<form name="form" action="<?=base_url('/cadastrar/categoria/salvar')?>" method="post">
						<div class="container-input">
							<label>Nome:</label>
							<input type="text" name="nome_categoria">
						</div>
						<div class="container-input">
							<label>Status</label>
							<select name="status_categoria">
								<option  value="" >Selecionar status</option>
								<option>Reserva</option>
								<option>Serviço</option>
							</select>
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="Submit" value="Cadastrar categoria">
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