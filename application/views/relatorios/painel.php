
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
			<div class="box-dados">
				<div class="box-dados-title">
					<h1>Estatísticas</h1>
				</div>
				<div class="box-estatisticas">
					<div class="box-numeros-estaticas">
						<span>Produtos Retirados: <b class="contador"><?php estatisticas('produtos_retirado')?></b> </span>
					</div>
					<div class="box-numeros-estaticas">
						<span>Trocas de óleos: <b class="contador"><?php  estatisticas('troca'); ?></b> </span>
					</div>
					<div class="box-numeros-estaticas">
						<span>Saida Manuntenção: <b class="contador"><?php  estatisticas('saida'); ?></b> </span>
					</div>
					<div class="box-numeros-estaticas">
						<span>Veiculos Indisponivel: <b class="contador"><?php estatisticas('veiculos_Indisponivel'); ?></b> </span>
					</div>
						<div class="box-numeros-estaticas">
						<span>Veiculos Disponivel: <b class="contador"><?php estatisticas('veiculos_disponivel'); ?></b> </span>
					</div>
				</div>
				<div class="box-dados-title">
					<h1>Manuntenções Recentes (abertas)</h1>
				</div>
				<div id="HTMLtoPDF">
					<table>
						<tr>
							<th>Veiculo substituto</th>
							<th>Veiculo manuntenção </th>
							<th>Data abertura</th>
							<th>Oficina</th>
							<th>Status </th>
						</tr>
						<?=substituiçao_veiculos();?>
					</table>
				</div>
			</div>
			<div class="box-dados">
				<div class="box-dados-title">
					<h1>Produtos Retirados</h1>
				</div>
				<table>
					<tr>
						<th>Data Retirada</th>
						<th>Quantidade retirada</th>
						<th>Produto</th>
						<th>Veiculos</th>
					</tr>
					<?=produtos_retirados(); ?>
				</table>
			</div>	
		</div>		
	</main>
	<?php include '../componentes/footer.inc'?>
	 <script src="../public/js/contador.js"></script>
</body>
</html>