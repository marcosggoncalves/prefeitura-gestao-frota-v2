<!-- controller -->
    <?php include '../../php/autoload.php'; ?>
    <?=validar_acesso_pages_filtros() ?>
<!-- ---------- -->
<!DOCTYPE html>
<html>
	<?php include '../componentes/head_page.inc'?>

<body>
	<?php include '../componentes/header.inc'?>
	<main>
		<?php include '../componentes/sidebar.inc'?>
		<div class="content" class='resposive_table'>
			<div class='box-dados'>
				<div class='box-dados-title'>
					<h1>Produtos Retirados - <b>(<?=$_SESSION['pesquisa']['nome_mes'].'/'.$_SESSION['pesquisa']['Ano'] ?>) </b></h1>
				</div>
				<table  id='HTMLtoPDF'>
					<tr>
						<th>Data Retirada</th>
						<th>Quantidade retirada</th>
						<th>Produto</th>
					</tr>
					<?php 
						foreach ($_SESSION['dados'] as $tr) {
							echo $tr;
						}
					 ?>
					<tfoot>
						<tr>
							<td>Total produtos retirados</td>
							<td><b><?php echo count($_SESSION['dados']); ?></b></td>
						</tr>
					</tfoot>
				</table>
				<button onclick= ' Gerar_pdf()'>Gerar documento</button>
			</div>
		</div>
	</main>
	<?php include '../componentes/footer.inc'?>
	<script type="text/javascript" src="../public/js/imprimir_mes.js"></script>
</body>
</html>