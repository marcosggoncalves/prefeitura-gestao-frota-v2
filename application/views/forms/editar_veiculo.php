<!-- controller -->
    <?php include '../../php/autoload.php'; ?>
    <?=validar_acesso_pages_veiculo()?>
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
					<h1>Editar veiculo</h1>
				</div>
				<div class="form_registrar">
					<form action="../../php/request.php?page=salvar/editar/veiculo&id=<?=$_SESSION['veiculo'][0]['id_veiculo']?>" method="post">
						<div class="container-input">
							<label for="placa_veiculo">Placa:</label>
							<input type="text" name="placa_veiculo" id="placa_veiculo" value="<?=$_SESSION['veiculo'][0]['placa_veiculo']?>">
						</div>
						<div class="container-input">
							<label for="desc_veiculo">Descrição:</label>
							<input type=text name="desc_veiculo" id="desc_veiculo" value="<?=$_SESSION['veiculo'][0]['descricao_veiculo']?>"></textarea>
						</div>
						<div class="container-input">
							<label>Status:</label>
							<select name="status">
								<option value="<?=$_SESSION['veiculo'][0]['status']?>">Status atual: <?=$_SESSION['veiculo'][0]['status']?></option>
								<option value="Disponivel">Disponivel</option>
								<option value="Indisponivel">Indisponivel</option>
							</select>
						</div>
						<div class="container-input">
							 <label>Categoria:</label>
							 <select  name="categoria_veiculo">
							 	<option  value="<?=$_SESSION['veiculo'][0]['id_categoria']?>" >Categoria atual: <?=$_SESSION['veiculo'][0]['nome_categoria']?>/<?=$_SESSION['veiculo'][0]['status_categoria']?></option>';
							 		<?=todas_categorias() ?>
							</select>
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="submit"  value="Cadastrar veiculo">
							</div>
						</div>
					</form>
				</div>
			</div>
	</main>
	<?php include '../componentes/footer.inc'?>
</body>
</html>