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
					<h1>Produtos</h1>
				</div>
				<div class="pagination">
					<?php if(!empty($links)): ?>
					<p><?=$links; ?></p>
					<?php endif; ?>	
				</div>
					<table id='HTMLtoPDF'>
						<tr>
							<th>Código</th>
							<th>Produto</th>
							<th>Data recebido</th>
							<th>Quantidade cadastradas</th>
							<th>Quantidade Restante</th>
						</tr>
						<?php foreach($produtos as $produto): ?>
							<tr>
								<td><?=$produto->id_produto ?></td>
								<td><?=$produto->nome_produto ?></td>
								<td><?=formatdata($produto->data_produto_recebido) ?></td>
								<td><?=$produto->quantidade_produto ?></td>
								<td><?=$produto->quantidade_restante ?></td>
								<?php if($produto->quantidade_produto == $produto->quantidade_restante): ?>
									<td><a href="<?=base_url("produto-editar/{$produto->id_produto}") ?>"><i class='material-icons'>edit</i></a></td>
									<td><a onClick='janela_mensagem("Remover","produto","<?=base_url("produto-deletar/{$produto->id_produto}") ?>")'><i class='material-icons  status_indisponível'>delete</i></a></td>
								<?php endif; ?>
							</tr>
						<?php endforeach; ?>
					</table>
					<button onclick= ' Gerar_pdf()'>Gerar documento</button>
				</div>
			</div>
		</div>
	</main>
	<?php include('public/componentes/footer.inc');?>
</body>
</html>