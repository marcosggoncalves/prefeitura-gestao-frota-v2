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
					<h1>Produtos Retirados</h1>
				</div>
					<table id='HTMLtoPDF'>
						<tr>
							<th>Data Retirada</th>
							<th>Quantidade retirada</th>
							<th>Produto</th>
							<th>Veiculo - reposição</th>
						</tr>
						<?php
							$paginas = filter_input(INPUT_GET,'pagina',FILTER_SANITIZE_SPECIAL_CHARS);
							$pagina = (isset($paginas))? $paginas : 1;
							all_produtos_retirados($pagina);
						?>
					</table><button onclick= 'Gerar_pdf()'>Gerar documento</button>	
				</div>
			</div>
		</div>
	</main>
	<?php include '../componentes/footer.inc'?>
	<script type="text/javascript" src="../public/js/imprimir_mes.js"></script>
</body>
</html>