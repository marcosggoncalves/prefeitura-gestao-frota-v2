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
					<h1>Trocas de óleos</h1>
				</div>
				<div class="pagination">
					<?php if(!empty($links)): ?>
					<p><?=$links; ?></p>
					<?php endif; ?>	
				</div>
					<table id='HTMLtoPDF'>
							<tr>
							<th>Código</th>
							<th>KM Troca</th>
							<th>Data Troca</th>
							<th>Veículo</th>
							<th>Próxima Troca</th>
						</tr>
						<tr>
							<?php foreach ($consulta as $troca):?>
							<tr>
								<td><?=$troca->id_controle_troca_oleo ?></td>
								<td><?=$troca->km_troca . '(KM)' ?></td>
								<td><?=formatData($troca->data_troca)?></td>
								<td><?=$troca->placa_veiculo ?></td>
								<td><?=!empty($troca->proxima_troca) ? $troca->proxima_troca . '(KM)' : 'N.D'?></td>
								<td><a href="<?=base_url("troca-oleo-editar-km/{$troca->id_controle_troca_oleo}");?>"><i class='material-icons'  title='Visualizar informações registrada na saida para manutenção  . '>edit</i></a></td>
				 				<td><a onClick='janela_mensagem("Remover","registro de troca de oleo","<?=base_url("troca-oleo-deletar/{$troca->id_controle_troca_oleo}");?>")'><i class='material-icons status_indisponível' title='Remover saida manutenção  registrada. ' >delete</i></a></td>
							</tr>
							<?php endforeach; ?>
						</tr>
						
					</table>
					<button onclick= ' Gerar_pdf()'>Gerar documento</button>
				</div>
			</div>
		</div>
	</main>
	<?php include('public/componentes/footer.inc');?>
</body>
</html>