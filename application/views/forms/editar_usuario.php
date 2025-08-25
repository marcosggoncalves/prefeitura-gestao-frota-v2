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
					<h1>Cadastrar Usuário</h1>
				</div>
				<div class="form_registrar">
					<form name="form" action="<?=base_url('usuario/editar/salvar/'.$usuario[0]->id_usuario.'') ?>" method="post">	
						<?php if (!isset($usuario[0]->id_usuario)) : ?>
							<div class="container-input">
								<label for="id_usuario">ID:</label>
								<input type="text" name="id_usuario" id="id_usuario" value="<?=$usuario[0]->id_usuario?>" readonly>
							</div>
						<?php endif;?>
						<div class="container-input">
							<label>Nome completo:</label>
							<input type="text" name="nome_usuario" value="<?=$usuario[0]->nome_usuario?>">
						</div>
						<div class="container-input">
							<label for="setor_usuario">Setor :</label>
							<input type="text" name="setor_usuario" id="setor_usuario" value="<?=$usuario[0]->setor_usuario?>">
						</div>
						<div class="container-input">
							<label for="telefone_usuario">Telefone :</label>
							<input type="text" name="telefone_usuario" id="telefone_usuario" value="<?=$usuario[0]->telefone_usuario?>">
						</div>
						<div class="container-input">
							<label for="email_usuario">Email :</label>
							<input type="text" name="email_usuario" id="email_usuario" value="<?=$usuario[0]->email_usuario?>">
						</div>
						<div class="container-input">
							<label for="senha_usuario">Senha :</label>
							<input type="text" name="senha_usuario" id="senha_usuario">
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="submit" value="Alterar Cadastro">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>		
	</main>
	<?php include('public/componentes/footer.inc');?>
</body>
</html>