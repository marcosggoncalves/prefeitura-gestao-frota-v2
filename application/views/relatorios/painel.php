<!DOCTYPE html>
<html>
	<?php include('public/componentes/head_page.inc');?>
<body>
	<?php include('public/componentes/header.inc');?>
	<main>
		<?php include('public/componentes/sidebar.inc');?>
			<?php include 'public/componentes/msg.inc'?>
		<div class="content">
			<div class="box-dados">
				<div class="box-dados-title">
					<h1>Estatísticas</h1>
				</div>
				<div class="box-estatisticas">
					<div class="box-numeros-estaticas">
						<span>Movimetações produto: <b class="contador"><?=$produtos_retirado?></b> </span>
					</div>
					<div class="box-numeros-estaticas">
						<span>Trocas de óleos: <b class="contador"><?=$troca_oleo?></b> </span>
					</div>
					<div class="box-numeros-estaticas">
						<span>Saida manutenção : <b class="contador"><?=$saida_manuntencao?></b> </span>
					</div>
					<div class="box-numeros-estaticas">
						<span>Veiculos Indisponivel: <b class="contador"><?=$veiculos_Indisponivel?></b> </span>
					</div>
						<div class="box-numeros-estaticas">
						<span>Veiculos Disponivel: <b class="contador"><?=$veiculos_disponivel?></b> </span>
					</div>
				</div>
				<?php if (!empty($manuntencoes_recentes)) :?>
					<div class="box-dados-title">
						<h1>Manutenções Recentes (abertas)</h1>
					</div>
					<div id="HTMLtoPDF">
						<table>
							<tr>
								<th>Veiculo substituto</th>
								<th>Veiculo manutenção  </th>
								<th>Data abertura</th>
								<th>Oficina</th>
								<th>Status </th>
							</tr>
							<?php foreach ($manuntencoes_recentes as $manuntencao):?>
								<tr>
									<td><?=$manuntencao->veiculo_substituicao ?></td>
									<td><?=$manuntencao->placa_veiculo?></td>
									<td><?=formatData($manuntencao->data_saida_veiculo) ?></td>
									<td><?=dataDiferenca($manuntencao->data_saida_veiculo,date('Y-m-d H:i:s')) ?></td>
									<td><?=$manuntencao->status ?></td>
								</tr>
							<?php endforeach;?>
						</table>
					</div>
				<?php endif; ?>
			</div>
			<?php if (!empty($produtos_movimentacoes)) :?>
			<div class="box-dados">
				<div class="box-dados-title">
					<h1>Últimas Movimentações Estoque</h1>
				</div>
				<table>
					<tr>
						<th>Data</th>
						<th>Quantidade</th>
						<th>Produto</th>
						<th>Veiculos</th>
						<th>Movimentação</th>
					</tr>
					<?php foreach ($produtos_movimentacoes as $produtos):?>
						<tr>
							<td><?=formatData($produtos->data_movimento) ?></td>
							<td><?=$produtos->quantidade_movimento ?></td>
							<td><?=$produtos->nome_produto ?></td>
							<td><?= empty($produtos->placa_veiculo) ? 'N.D' : $produtos->placa_veiculo ?></td>
							<td><?=$produtos->tipo_movimentacao == 0 ? 'Saida' : 'Entrada' ?></td>
						</tr>
					<?php endforeach;?>
				</table>
			</div>	
			<?php endif; ?>
		</div>		
	</main>
	<?php include('public/componentes/footer.inc');?>
	 <script src="<?=base_url('/public/js/contador.js') ?>"></script>
</body>
</html>