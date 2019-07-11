<!DOCTYPE html>
<html>
	<link rel="manifest" href="pages/public/manifest.json">
	<?php include 'pages/componentes/head.inc'?>
	<body>
		<main>
			<div class="login">
				<form name="form" action="php/request?page=Logar" method="post">
					<div class="titulo">
						<div>	
							<h1>Transporte escolar</h1>
							<h2>Sistema de controle</h2>	
						</div>
					</div>
					<div class="container-login">
						<label for="Usuário">Usuário</label>
						<input type="text" name="Usuário" id="Usuário">
					</div>

					<div class="container-login">
						<label for="senha">Senha</label>
						<input type="password" name="senha" id="senha">
					</div>
					<div class="container-login">	
						<input type="button" value="Entrar" onclick="inputs_name_validar('Usuário','senha')">
					</div>
					<div>
						<?php include 'pages/componentes/msg.inc' ?>
					</div>
				</form>
			</div>
		</main>	
	</body>
</html>
