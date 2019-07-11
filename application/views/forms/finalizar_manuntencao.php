<!-- controller -->
    <?php include '../../php/autoload.php'; ?>
     <?=validar_acesso_page_manuntencao() ?>
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
				<div class="form_registrar">
						<form name="form" action="../../php/request.php?page=Finalizar/manuntenção&id=<?= $_SESSION['manuntencao'][0]['id_saida_manuntencao'] ?>" method="post">
							<div class="box-dados-title">
								<h1>Registrar saida manuntenção veiculo <b> - (<?= $_SESSION['manuntencao'][0]['placa_veiculo'] ?>)</b></h1>
							</div>
							<div class="container-input">
								<label >Cód manuntenção:</label>
								<input type="number" name="cod_manuntencao" value="<?= $_SESSION['manuntencao'][0]['id_saida_manuntencao'] ?>" readonly>
							</div>
							<div class="container-input">
								<label fpr="data_manuntencao">Data saida:</label>
								<input type="text" name="data_manuntencao" id="data_manuntencao" value="<?= $_SESSION['manuntencao'][0]['data_saida_veiculo'] ?>" readonly>
							</div>
							<div class="container-input">
								<label for="km_saida_manuntencao">KM saida (dados editável):</label>
								<input type="text" name="km_saida_manuntencao" id="km_saida_manuntencao" value="<?= $_SESSION['manuntencao'][0]['km_saida_veiculo'] ?>">
							</div>
							<div class="container-input">
								<label for="km_entrada_veiculo">Quilometragem Entrada (dados editável) : </label>
								<input type="text" name="km_entrada_veiculo" id="km_entrada_veiculo" value="<?= $_SESSION['manuntencao'][0]['km_retorno_veiculo'] ?>">
							</div>
							<div class="container-input">
								<label for="placa_veiculo">Placa veiculo manuntenção:</label>
								<input type="text" name="placa_veiculo" id="placa_veiculo" value="<?= $_SESSION['manuntencao'][0]['placa_veiculo'] ?>" readonly >
							</div>
							<div class="container-input">
								<label for="substituto_placa_veiculo">Placa veiculo substituto:</label>
								<input type="text" name="substituto_placa_veiculo" id="substituto_placa_veiculo" value="<?= $_SESSION['manuntencao'][0]['veiculo_substituicao'] ?>" readonly >
							</div>
							<div class="container-input">
								<label>Status:</label>
								<input type="text" name="status" value="<?= $_SESSION['manuntencao'][0][4] ?>" readonly>
							</div>
							<div class="conjuntos_btns">
								<div>
									<input type="button" name="button" onclick='inputs_name_validar("km_entrada_veiculo")' value="Finalizar manuntenção">
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