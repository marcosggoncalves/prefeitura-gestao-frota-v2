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
					<form name="form" action="../../php/request.php?page=Salvar/usuario" method="post">
						<div class="container-input">
							<label for="nome_user">Nome completo:</label>
							<input type="text" id="nome_user" name="nome_user">
						</div>
						<div class="container-input">
							<label for="setor_user">Setor :</label>
							<select name="setor_user" id="setor_user">
								<option value="" >Selecionar setor</option>
								<option>T.I</option>
								<option>Adm</option>
								<option>Sec</option>
							</select>
						</div>
						<div class="container-input">
							<label for="telefone_user">Telefone :</label>
							<input type="text" name="telefone_user" id="telefone_user">
						</div>
						<div class="container-input">
							<label for="email_user">Email :</label>
							<input type="text" name="email_user" id="email_user">
						</div>
						<div class="container-input">
							<label for="senha_user">Senha :</label>
							<input type="text" name="senha_user" id="senha_user">
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="button" name="button" onclick="inputs_name_validar('nome_user','setor_user','telefone_user','email_user','senha_user')" value="Cadastrar Usuário">
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