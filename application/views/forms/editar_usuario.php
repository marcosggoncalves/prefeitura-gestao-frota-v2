<!-- controller -->
    <?php include '../../php/autoload.php'; ?>
<!-- ---------- -->
<!DOCTYPE html>
<html>
	<?php include '../componentes/head_page.inc'?>
<body>
	<?php include '../componentes/header.inc'?>
	<main>
		<?php include '../componentes/sidebar.inc'?>
		<div class="content">
			<div class="box-dados">
				<div class="box-dados-title">
					<h1>Cadastrar Usuário</h1>
				</div>
				<div class="form_registrar">
					<form name="form" action="../../php/request.php?page=editar/usuario" method="post">	
						<div class="container-input">
							<label for="id_usuario">ID:</label>
							<input type="text" name="id_usuario" id="id_usuario" value="<?=$_SESSION['user']['id_usuario']?>" readonly>
						</div>
						<div class="container-input">
							<label>Nome completo:</label>
							<input type="text" name="nome_usuario" value="<?=$_SESSION['user']['nome_usuario']?>">
						</div>
						<div class="container-input">
							<label for="setor_usuario">Setor :</label>
							<input type="text" name="setor_usuario" id="setor_usuario" value="<?=$_SESSION['user']['setor_usuario']?>">
						</div>
						<div class="container-input">
							<label for="telefone_usuario">Telefone :</label>
							<input type="text" name="telefone_usuario" id="telefone_usuario" value="<?=$_SESSION['user']['telefone_usuario']?>">
						</div>
						<div class="container-input">
							<label for="email_usuario">Email :</label>
							<input type="text" name="email_usuario" id="email_usuario" value="<?=$_SESSION['user']['email_usuario']?>">
						</div>
						<div class="container-input">
							<label for="senha_usuario">Senha :</label>
							<input type="text" name="senha_usuario" id="senha_usuario" value="<?=$_SESSION['user']['senha_usuario'] ?>">
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="button" name="button" onclick="inputs_name_validar('nome_usuario','telefone_usuario','email_usuario','senha_usuario')" value="Alterar Cadastro">
							</div>
						</div>
						<div>
							<?php include '../componentes/msg.inc' ?>
						</div>
					</form>
				</div>
			</div>
		</div>		
	</main>
	<?php include '../componentes/footer.inc'?>
</body>
</html>