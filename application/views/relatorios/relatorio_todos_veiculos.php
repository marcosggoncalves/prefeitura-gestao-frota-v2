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
					<h1>Veiculos registrados</h1>
				</div>
					<table id='HTMLtoPDF'>
						<tr>
							<th>Código</th>
							<th>Veículo</th>
							<th>Descrição</th>
							<th>Status atual</th>
							<th>Categoria</th>
							<th>Tipo</th>
						</tr>
						<?php
							$paginas = filter_input(INPUT_GET,'pagina',FILTER_SANITIZE_SPECIAL_CHARS);
							$pagina = (isset($paginas))? $paginas : 1;
							all_veiculos($pagina);
						?>
					</table>
					<button onclick= 'Gerar_pdf()'>Gerar documento</button>	
				</div>
			</div>
			<div>
				<?php include '../componentes/msg.inc' ?>
			</div>
		</div>
	</main>
	<?php include '../componentes/footer.inc'?>
	<script type="text/javascript" src="../public/js/imprimir_mes.js"></script>
</body>
</html>