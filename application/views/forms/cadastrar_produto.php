<!-- controller -->
    <?php include '../../php/autoload.php'; ?>
<!-- ---------- -->
<!DOCTYPE html>
<html>
	<?php include '../componentes/head_page.inc'?>
<body>
	<?php include '../componentes/header.inc'?>
	<main>
		<?php include '../componentes/sidebar.inc'?>
		<div class="content">
			<div class="box-dados">
				<div class="box-dados-title">
					<h1>Cadastrar produto</h1>
				</div>
				<div class="form_registrar">
					<form  name="form" action="../../php/request.php?page=Salvar/produto" method="post">
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
								<input type="button" name="button" onclick="inputs_name_validar('nome_produto','quantidade_produto')" value="Cadastrar produto">
							</div>
						</div>
						<div>
							<?php include '../componentes/msg.inc' ?>
						</div>
					</form>
				</div>
			</div>
		</div>		
	</main>
	<?php include '../componentes/footer.inc'?>
</body>
</html>
