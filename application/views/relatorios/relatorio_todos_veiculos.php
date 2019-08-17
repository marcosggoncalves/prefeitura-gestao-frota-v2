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
					<h1>Veiculos registrados</h1>
				</div>
				<div class="pagination">
					<?php if(!empty($links)): ?>
					<p><?=$links; ?></p>
					<?php endif; ?>	
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
						<?php foreach ($veiculos as $veiculo):?>
						<tr>
							<td><?=$veiculo->id_veiculo ?></td>
							<td><?=$veiculo->placa_veiculo ?></td>
							<td><?=$veiculo->descricao_veiculo?></td>
							<?php if($veiculo->status_veiculo == 'Disponivel'): ?>
								<td class='status_diponivel'><?=$veiculo->status_veiculo?></td>
							<?php else: ?>
								<td class='status_indisponível'><?=$veiculo->status_veiculo?></td>
							<?php endif; ?>
							<td><?=$veiculo->nome_categoria?></td>
							<td><?=$veiculo->status_categoria?></td>
							<td><a onClick='janela_mensagem("Remover","veiculo da frota","<?=base_url("veiculo-deletar/{$veiculo->id_veiculo}") ?>")'><i class='material-icons status_indisponível'>delete</i></a></td>
							<td><a href="<?=base_url("veiculo-editar/{$veiculo->id_veiculo}")?>"><i class='material-icons'>edit</i></a></td>
						</tr>
						<?php endforeach; ?>
					</table>
					<button onclick= 'Gerar_pdf()'>Gerar documento</button>	
				</div>
			</div>
		</div>
	</main>
	<?php include('public/componentes/footer.inc');?>
</body>
</html>