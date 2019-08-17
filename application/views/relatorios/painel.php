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
						<span>Produtos Retirados: <b class="contador"><?=$produtos_retirado?></b> </span>
					</div>
					<div class="box-numeros-estaticas">
						<span>Trocas de óleos: <b class="contador"><?=$troca_oleo?></b> </span>
					</div>
					<div class="box-numeros-estaticas">
						<span>Saida Manuntenção: <b class="contador"><?=$saida_manuntencao?></b> </span>
					</div>
					<div class="box-numeros-estaticas">
						<span>Veiculos Indisponivel: <b class="contador"><?=$veiculos_Indisponivel?></b> </span>
					</div>
						<div class="box-numeros-estaticas">
						<span>Veiculos Disponivel: <b class="contador"><?=$veiculos_disponivel?></b> </span>
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
						<?php foreach ($manuntencoes_recentes as $manuntencao):?>
							<tr>
								<td><?=$manuntencao->veiculo_substituicao ?></td>
								<td><?=$manuntencao->placa_veiculo?></td>
								<td><?=formatdata($manuntencao->data_saida_veiculo) ?></td>
								<td><?=data_diferença($manuntencao->data_saida_veiculo,date('Y-m-d H:i:s')) ?></td>
								<td><?=$manuntencao->status ?></td>
							</tr>
						<?php endforeach;?>
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
					<?php foreach ($produtos_retirado_lista as $produtos):?>
							<tr>
								<td><?=formatdata($produtos->data_retirada_produto) ?></td>
								<td><?=$produtos->quantidade_retirada ?></td>
								<td><?=$produtos->nome_produto ?></td>
								<td><?=$produtos->placa_veiculo ?></td>
							</tr>
						<?php endforeach;?>
				</table>
			</div>	
		</div>		
	</main>
	<?php include('public/componentes/footer.inc');?>
	 <script src="<?=base_url('/public/js/contador.js') ?>"></script>
</body>
</html>