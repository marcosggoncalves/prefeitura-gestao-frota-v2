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
				<h1>Alterar produto</h1>
			</div>
			<div class="form_registrar">
					<form  name="form" action="<?=base_url("produto-editar-salvar/{$consulta[0]->id_produto}") ?>" method="post">
						<div class="container-input">
							<label>Nome produto</label>
						<input type="text" name="nome_produto" value="<?=$consulta[0]->nome_produto?>">
							</div>
						<div class="container-input">
							<label>Quantidade produto</label>
							<input type="number" name="quantidade_produto" value="<?=$consulta[0]->quantidade_produto?>">
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="submit" value="Alterar produto">
							</div>
						</div>
					</form>
				</div>
		</div>		
	</main>
	<?php include('public/componentes/footer.inc');?>
</body>
</html>