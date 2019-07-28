<!DOCTYPE html>
<html>
	<?php include('public/componentes/head_page.inc');?>
<body>
	<?php include('public/componentes/header.inc');?>
	<main>
		<?php include('public/componentes/sidebar.inc');?>
		<div class="content">
			<div class="box-dados">
				<div class="box-dados-title">
					<h1>Cadastrar produto</h1>
				</div>
				<div class="form_registrar">
					<form  name="form" action="<?=base_url('/cadastrar/produto/salvar')?>" method="post">
						<div class="container-input">
							<label for="nome_produto">Nome produto</label>
							<input type="text" name="nome_produto" id="nome_produto">
						</div>
						<div class="container-input">
							<label for="quantidade_produto">Quantidade produto</label>
							<input type="number" name="quantidade_produto" id="quantidade_produto">
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="submit" value="Cadastrar produto">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>	
		<div>
			<?php include('public/componentes/msg.inc');?>
		</div>	
	</main>
	<?php include('public/componentes/footer.inc');?>
</body>
</html>
