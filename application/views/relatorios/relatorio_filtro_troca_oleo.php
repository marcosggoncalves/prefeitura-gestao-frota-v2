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
		<div class="content">
			<div class="resposive_table">
				<div class='box-dados' >
				<div class='box-dados-title'>
					<h1>Trocas de óleo - <b>(<?=$_SESSION['pesquisa']['nome_mes'].'/'.$_SESSION['pesquisa']['Ano'] ?>) </b></h1>
				</div>
				<table id='HTMLtoPDF'>
					<tr>
						<th>Código</th>
						<th>KM Troca</th>
						<th>Data Troca</th>
						<th>Veículo</th>
						<th>Próxima Troca</th>
					</tr>
					<?php 
						foreach ($_SESSION['dados'] as $tr) {
							echo $tr;
						}
					 ?>
					</table>
					<button onclick= ' Gerar_pdf()'>Gerar documento</button>
				</div>
			</div>
		</div>
	</main>
	<?php include '../componentes/footer.inc'?>
	<script type="text/javascript" src="../public/js/imprimir_mes.js"></script>
</body>
</html>