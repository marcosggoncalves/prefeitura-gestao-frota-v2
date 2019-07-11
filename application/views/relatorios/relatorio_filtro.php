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
			<div class="box-dados-title">
				<h1>Relatório Mensal</h1>
			</div>
			<form name="form" action="../../php/request.php?page=relatorio/filtros" method="post">
				<div class="col-filter">
						<label for="mes">Mês relatório</label>
						<select id="mes" name="mes"></select>
				</div>
				<div class="col-filter">
						<label for="nome_mes">Mês</label>
						<input type="text" name="nome_mes" id="nome_mes">
				</div>
				<div class="col-filter">
						<label for="Ano">Ano</label>
						<input type="text" name="Ano" id="Ano" value='<?php echo date('o')?>'>
				</div>
				<div class="col-filter">
						<label for="tipo_relatorio">Tipo relatório</label>
						<select name="tipo_relatorio" >
							<option value="">Selecione tipo relatório</option>
							<option>Produtos Retirados</option>
							<option>Saida Manuntenção</option>
							<option>Troca de oleo</option>
						</select>
				</div>
				<div class="conjuntos_btns">
					<div>
						<input type="button" onclick='inputs_name_validar("nome_mes","mes","Ano","tipo_relatorio")' value="Filtrar dados" />
					</div>
				</div>
				<div id="msg" class="msg"></div>
				<?php include '../componentes/msg.inc' ?>
			</form>
		</div>
	</main>
	<?php include '../componentes/footer.inc'?>
	<script type="text/javascript" src="../public/js/imprimir_mes.js"></script>
</body>
</html>