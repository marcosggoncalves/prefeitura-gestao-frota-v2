<!DOCTYPE html>
<html>
	<?php include('public/componentes/head_page.inc');?>
<body>
	<?php include('public/componentes/header.inc');?>
	<main>
		<?php include('public/componentes/sidebar.inc');?>
		<?php include 'public/componentes/msg.inc'?>
		<div class="content">
			<div  class='resposive_table'>
				<div class='box-dados'>
				<div class='box-dados-title'>
					<h1>Produtos Retirados</h1>
				</div>
				<div class="pagination">
					<?php if(!empty($links)): ?>
					<p><?=$links; ?></p>
					<?php endif; ?>	
				</div>
					<table id='HTMLtoPDF'>
						<tr>
							<th>Data Retirada</th>
							<th>Quantidade retirada</th>
							<th>Produto</th>
							<th>Veiculo - reposição</th>
						</tr>
					<?php foreach($produtos as $produto ):?>
						<tr>
							<td><?=formatdata($produto->data_retirada_produto)?></td>
							<td><?=$produto->quantidade_retirada?></td>
							<td><?=$produto->nome_produto?></td>
							<td><?=$produto->placa_veiculo?></td>
						</tr>
					<?php endforeach;?>
					</table><button onclick= 'Gerar_pdf()'>Gerar documento</button>	
				</div>
			</div>
		</div>
	</main>
	<?php include('public/componentes/footer.inc');?>
	<script type="text/javascript" src="<?=base_url('public/js/imprimir_mes.js')?>"></script>
</body>
</html>