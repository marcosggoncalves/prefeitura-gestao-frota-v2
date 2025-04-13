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
					<h1>Saida manutenção  - relatório final</h1>
				</div>
					<table id='HTMLtoPDF'>
					<tr>
						<th>Código</th>
						<th>Data retorno</th>
						<th>Km retorno</th>
						<th>Km saida</th>
						<th>Data saida</th>
						<th>Veículo manutenção </th>
						<th>Veículo substituto</th>
						<th>Diferença</th>
						<th>Oficina</th>
					</tr>
					<tr>
						<td><?= $consulta[0]->id_saida_manuntencao?></td>
						<td><?= formatData($consulta[0]->data_retorno_veiculo)?></td>
						<td><?= $consulta[0]->km_retorno_veiculo ?></td>
						<td><?= $consulta[0]->km_saida_veiculo ?></td>
						<td><?= formatData($consulta[0]->data_saida_veiculo) ?></td>
						<td><?= $consulta[0]->placa_veiculo?></td>
						<td><?= $consulta[0]->veiculo_substituicao?></td>
						<td><?=diferencakm($consulta[0]->km_saida_veiculo,$consulta[0]->km_retorno_veiculo);?></td>
						<td><?=dataDiferenca($consulta[0]->data_saida_veiculo,$consulta[0]->data_retorno_veiculo);?></td>
					</tr>
					<tfoot>
						<tr>
							<td>Situação saida: <b><?= $consulta[0]->status?></b><td>
						</tr>
					</tfoot>
					</table>
					<div class='descricao_veiculo '>
						<p><b>Descrição manutenção : <?= $consulta[0]->desc_manuntencao ?></b></p>
					</div>
					<button onclick= 'Gerar_pdf()'>Gerar documento</button>
				</div>
			</div>
		</div>
	</main>
	<?php include('public/componentes/footer.inc');?>
</body>
</html>