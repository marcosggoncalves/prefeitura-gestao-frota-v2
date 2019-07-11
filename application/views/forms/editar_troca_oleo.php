<!-- controller -->
    <?php include '../../php/autoload.php'; ?>
    <?=validar_acesso_page_troca_oleo() ?>
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
				<h1>Alterar KM</h1>
			</div>
			<div class="form_registrar">
				<form action="../../php/request.php?page=editar/salvar/troca&id=<?=$_SESSION['troca_oleo'][0]['id_controle_troca_oleo']?>" method="post">
						<div class="container-input">
							<label for="troca">KM Troca óleo:</label>
							<input type="text" id="troca" name="troca" value="<?=$_SESSION['troca_oleo'][0]['km_troca']?>">
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="submit"  value="Cadastrar veiculo">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>		
	</main>
	<?php include '../componentes/footer.inc'?>
</body>
</html>