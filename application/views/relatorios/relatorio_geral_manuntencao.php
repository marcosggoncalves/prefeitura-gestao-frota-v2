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

			<div  class='resposive_table'>
				<div class='box-dados'>
				<div class='box-dados-title'>
					<h1>Produtos Retirados</h1>
				</div>
					<table id='HTMLtoPDF'>
					<tr>
						<th>Código</th>
						<th>Data retorno</th>
						<th>Km retorno</th>
						<th>Km saida</th>
						<th>Data saida</th>
						<th>Veículo manuntenção</th>
						<th>Veículo substituto</th>
						<th>Diferença</th>
						<th>Oficina</th>
					</tr>
					<tr>
						<td><?= $_SESSION['manuntencao'][0]['id_saida_manuntencao'] ?></td>
						<td><?= $GLOBALS['Recursos']->formatdata($_SESSION['manuntencao'][0]['data_retorno_veiculo']); ?></td>
						<td><?= $_SESSION['manuntencao'][0]['km_retorno_veiculo'] ?></td>
						<td><?= $_SESSION['manuntencao'][0]['km_saida_veiculo'] ?></td>
						<td><?= $GLOBALS['Recursos']->formatdata($_SESSION['manuntencao'][0]['data_saida_veiculo']); ?></td>
						<td><?= $_SESSION['manuntencao'][0]['placa_veiculo'] ?></td>
						<td><?= $_SESSION['manuntencao'][0]['veiculo_substituicao'] ?></td>
						<td><?= $GLOBALS['Recursos']->diferença_km($_SESSION['manuntencao'][0]['km_retorno_veiculo'],$_SESSION['manuntencao'][0]['km_saida_veiculo'])?></td>
						<td><?=$GLOBALS['Recursos']->data_diferença($_SESSION['manuntencao'][0]['data_retorno_veiculo'] ,$_SESSION['manuntencao'][0]['data_saida_veiculo'])?></td>
					</tr>
					<tfoot>
						<tr>
							<td>Situação saida: <?= $_SESSION['manuntencao'][0][4] ?><td>
						</tr>
					</tfoot>
					</table>
					<div class='descricao_veiculo '>
						<p><b>Descrição manuntenção:<?= $_SESSION['manuntencao'][0]['desc_manuntencao'] ?></b></p>
					</div>
					<button onclick= 'Gerar_pdf()'>Gerar documento</button>
				</div>
			</div>
		</div>
	</main>
	<?php include '../componentes/footer.inc'?>
	<script type="text/javascript" src="../public/js/imprimir_mes.js"></script>
</body>
</html>