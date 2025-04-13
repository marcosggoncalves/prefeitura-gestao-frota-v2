<!DOCTYPE html>
<html>
	<?php include('public/componentes/head_page.inc');?>
<body>
	<?php include('public/componentes/header.inc');?>
	<main>
		<?php include('public/componentes/sidebar.inc');?>
		<?php include('public/componentes/msg.inc');?>
		<div class="content">
			<div class="box-dados">
				<div class="box-dados-title">
					<h1>Cadastrar categoria</h1>
				</div>
				<div class="form_registrar">
					<form name="form" action="<?=base_url('/cadastrar/categoria/salvar')?>" method="post">
						<div class="container-input">
							<label>Nome:</label>
							<input type="text" name="nome_categoria">
						</div>
						<div class="container-input">
							<label>Status</label>
							<select name="status_categoria">
								<option  value="" >Selecionar status</option>
								<option>Reserva</option>
								<option>Serviço</option>
							</select>
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="Submit" value="Cadastrar categoria">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="content">
			<div class="box-dados">
				<div class="box-dados-title">
					<h1>Categorias cadastradas</h1>
				</div>
				<div class="pagination">
					<?php if(!empty($links)): ?>
					<p><?=$links; ?></p>
					<?php endif; ?>	
				</div>
				<table id='HTMLtoPDF'>
					<tr>
						<th>Código</th>
						<th>Nome categoria</th>
						<th>Tipo categoria</th>
					</tr>
					<?php foreach ($categoria as $value):?>
						<tr>
							<td><?=$value->id_categoria?></td>
							<td><?=$value->nome_categoria?></td>
							<td><?=$value->status_categoria?></td>
							<td><a href="<?=base_url("categoria-editar/{$value->id_categoria}") ?>"><i class='material-icons' title='Fechar saida manutenção  registrada. '>edit</i></a></td>
							 <td><a onClick="janela_mensagem('Remover','Saida manutenção ','<?=base_url("categoria-deletar/{$value->id_categoria}")?>')"><i class='material-icons status_indisponível' title='Remover saida manutenção  registrada. '>delete</i></a></td>
						</tr>
					<?php endforeach;?>
				</table>
			</div>
		</div>		
	</main>
	<?php include('public/componentes/footer.inc');?>
</body>
</html>