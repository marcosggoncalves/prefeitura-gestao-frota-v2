<!-- controller -->
    <?php include '../../php/autoload.php'; ?>
    <?=validar_acesso_pages_produto();?>
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
				<h1>Alterar produto</h1>
			</div>
			<div class="form_registrar">
					<form  name="form" action="../../php/request.php?page=editar/salvar/produto&id=<?=$_SESSION['produto']['id_produto']?>" method="post">
						<div class="container-input">
							<label>Nome produto</label>
						<input type="text" name="nome_produto" value="<?=$_SESSION['produto']['nome_produto']?>">
							</div>
						<div class="container-input">
							<label>Quantidade produto</label>
							<input type="number" name="quantidade_produto" value="<?=$_SESSION['produto']['quantidade_produto']?>">
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="button" name="button" onclick='inputs_name_validar("nome_produto","quantidade_produto")'value="Alterar produto">
							</div>
						</div>
						<div>
								<?php include "../componentes/msg.inc" ?>
						</div>
					</form>
				</div>
		</div>		
	</main>
	<?php include '../componentes/footer.inc'?>
</body>
</html>