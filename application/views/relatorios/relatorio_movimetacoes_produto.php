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
					<h1>Movimentações Estoque</h1>
				</div>
				<div class="pagination">
					<?php if(!empty($links)): ?>
					<p><?=$links; ?></p>
					<?php endif; ?>	
				</div>
					<table id='HTMLtoPDF'>
						<tr>
							<th>Data</th>
							<th>Quantidade</th>
							<th>Produto</th>
							<th>Veiculos</th>
							<th>Movimentação</th>
							<th>Usuário</th>
						</tr>
					<?php foreach($produtos as $produto ):?>
						<tr>
							<td><?=formatData($produto->data_movimento) ?></td>
							<td><?=$produto->quantidade_movimento ?></td>
							<td><?=$produto->nome_produto ?></td>
							<td><?= empty($produto->placa_veiculo) ? 'N.D' : $produto->placa_veiculo ?></td>
							<td><?=$produto->tipo_movimentacao == 0 ? 'Saida' : 'Entrada' ?></td>
							<td><?=$produto->nome_usuario?></td>
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