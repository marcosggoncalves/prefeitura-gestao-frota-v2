<!DOCTYPE html>
<html>
	<?php include('public/componentes/head_page.inc');?>
<body>
	<?php include('public/componentes/header.inc');?>
	<main>
		<?php include('public/componentes/sidebar.inc');?>
		<?php include('public/componentes/msg.inc');?>
		<div class="content">
			<div  class='resposive_table'>
				<div class='box-dados'>
				<div class='box-dados-title'>
					<h1>Usuários cadastrados</h1>
				</div>
				<div>
					<table id='HTMLtoPDF'>
						<thead>
							<tr>
								<th>Código</th>
								<th>Nome</th>
								<th>Setor</th>
								<th>Último acesso</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($usuarios as $usuario):?>
								<?php if($usuario->status == 'Inativo'): ?>
									<tr class="status_indisponível">
										<td><?=$usuario->id_usuario ?></td>
										<td><?=$usuario->nome_usuario ?></td>
										<td><?=$usuario->setor_usuario ?></td>
										<?php if($usuario->acesso == null): ?>
											<td>Não houve acesso</td>
										<?php else: ?>
											<td><?=formatdata($usuario->acesso)?></td>
										<?php endif; ?>	
										<td><?=$usuario->status ?></td>
										<td><a href="<?=base_url('usuario/deletar/'.$usuario->id_usuario.'')?>"><i class='material-icons status_indisponível' >delete</i></a></td>
										<td><a href="<?=base_url('usuario/desbloquear/'.$usuario->id_usuario.'')?>"><i class='material-icons status_indisponível' >lock_open</i></a></td>
									</tr>
								<?php else: ?>
									<tr>
										<td><?=$usuario->id_usuario ?></td>
										<td><?=$usuario->nome_usuario ?></td>
										<td><?=$usuario->setor_usuario ?></td>
										<?php if($usuario->acesso == null): ?>
											<td>Não houve acesso</td>
										<?php else: ?>
											<td><?=formatdata($usuario->acesso)?></td>
										<?php endif; ?>	
										<td><?=$usuario->status ?></td>
										<td><a href="<?=base_url('usuario/deletar/'.$usuario->id_usuario.'')?>"><i class='material-icons status_indisponível' >delete</i></a></td>
										<td><a href="<?=base_url('usuario/bloquear/'.$usuario->id_usuario.'')?>"><i class='material-icons status_diponivel' >lock_open</i></a></td>
									</tr>
								<?php endif; ?>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
					<button onclick= 'Gerar_pdf()'>Gerar documento</button>	
				</div>
			</div>
		</div>
	</main>
	<?php include('public/componentes/footer.inc');?>
</body>
</html>