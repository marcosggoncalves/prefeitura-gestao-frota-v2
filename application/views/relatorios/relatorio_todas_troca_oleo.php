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
			<div  class='resposive_table'>
				<div class='box-dados'>
				<div class='box-dados-title'>
					<h1>Trocas de óleos</h1>
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
							$paginas = filter_input(INPUT_GET,'pagina',FILTER_SANITIZE_SPECIAL_CHARS);
							$pagina = (isset($paginas))? $paginas : 1;
							all_troca_oleo($pagina);
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