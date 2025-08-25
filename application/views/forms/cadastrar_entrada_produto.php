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
					<h1>Registrar entrada produto</h1>
				</div>
				<div class="form_registrar">
					<form name="form" action="<?=base_url('/registrar/entrada/produto/salvar')?>" method="post">
						<div class="container-input">
							<label for="quantidade_movimento">Quantidade:</label>
							<input type="number" name="quantidade_movimento" id="quantidade_movimento">
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
						<div class="conjuntos_btns">
							<div>
								<input type="submit"  value="Registrar entrada">
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